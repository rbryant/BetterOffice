<?php
function setStatus($intStatus, $Current){
		$intStatus = $intStatus;
		if($intStatus == $Current){
			return 'info';
		}
}

function setClass($intStatus, $Current){
		$intStatus = (string)$intStatus;
		if($intStatus > $Current){
			return 'status-'.$Current.'-done btn-mini';
		}else{
			return 'btn-mini';
		}
}

$this->breadcrumbs=array(
	'Project'=>array('index'),
	$model->name,
);
$history = Browsehistory::getInstance();
$history->push(null, $model->name, 'icon-globe');

	$contactData=Yii::app()->db->createCommand("
		SELECT c.id, c.firstname, c.lastname, p.number, v.name
		FROM contact c
		left join phone p on p.ref_id = c.id and module='company'
		left join valuelist v on p.type = v.value and v.module='phone' and v.field='type'
		where c.company_id='".$model->company."'")->queryAll();
	
	$contactDataProvider = new CArrayDataProvider($contactData, array(
		'keyField'=>'id',
		'pagination'=>array(
			'pageSize'=>30,
			),
	));

	$taskData=Yii::app()->db->createCommand("
		SELECT p.id, max(p.budget) as Budget, sum(t.quantity * r.billrate) as Planned, sum(w.hours*r.payrate) as Committed, 
			sum(i.linecost) as Paid, sum(w.hours*r.payrate) - sum(i.linecost) as Open, 
			max(p.budget) - sum(t.quantity*100) as Value, max(p.percent_complete) as Comp
		FROM project p
		left join task t on t.project = p.id
		left outer join worklog w on t.id = w.task
		left outer join resource r on w.resource = r.id
		left outer join invoice_line i on i.project = p.id and i.task = t.id
		where p.id='".$model->id."'")->queryAll();
	
	$taskDataProvider = new CArrayDataProvider($taskData, array(
		'keyField'=>'id',
		'pagination'=>array(
			'pageSize'=>30,
			),
	));	
	
        $id = $model->id;
        // Get Record Counts
        $cNotes = Comment::model()->count("module='project' and ref_id = $id");
        $cTasks = Task::model()->count('project=:project', array('project'=>$id));
	
	
?>

<div class="row-fluid grid-container">
    <div class="span8">
       <div class="row-fluid">
        <?php 
        $this->beginWidget('bootstrap.widgets.TbBox', array(
			'title' => $model->name,
			'headerIcon' => 'icon-home',
			'headerButtons' => array(
        		array(
        			'class' => 'bootstrap.widgets.TbButton',
        			'label' => 'Edit',
        			'size'=>'mini', 
					'type'  => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'url'   =>	array('/project/update/'.$model->id),
        			'htmlOptions' => array('class' => 'btn'),
				),
				array(
			        'class' => 'bootstrap.widgets.TbButtonGroup',
					'buttons'=>array(
						array('label'=>'Pending', 'type'=>setStatus($model->status, 1), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 1))),
						array('label'=>'Approved', 'type'=>setStatus($model->status, 2), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 2))),
						array('label'=>'In Progress', 'type'=>setStatus($model->status, 3), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 3))),
						array('label'=>'Complete', 'type'=>setStatus($model->status, 4), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 4))),
						array('label'=>'Closed', 'type'=>setStatus($model->status, 5), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 5))),
					),
				),
				),			
		));

		?>
        <?php 
        	foreach ($taskDataProvider->getData() as $column) : 
        	?>
				<div class="summary-table" id="yw2">
				<table class="items table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align:center" id="yw2_c0">Budget</th>
							<th style="text-align:center" id="yw2_c1">Planned</th>
							<th style="text-align:center" id="yw2_c2">Committed</th>
							<th style="text-align:center" id="yw2_c3">Paid</th>
							<th style="text-align:center" id="yw2_c4">Open</th>
							<th style="text-align:center" id="yw2_c5">Value</th>
							<th style="text-align:center" id="yw2_c6">% Complete</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Budget'],'USD'); ?></td>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Planned'],'USD'); ?></td>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Committed'],'USD'); ?></td>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Paid'],'USD'); ?></td>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Open'],'USD'); ?></td>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($column['Value'],'USD'); ?></td>
							<td><?php $this->widget('bootstrap.widgets.TbProgress', array('percent' => $column['Comp'])); ?></td>
						</tr>
					</tbody>
				</table><div class="keys" style="display:none" title="/test/index.php/project/1"><span>1</span></div>
				</div>        		
        <?php 
        	endforeach;
       	?>
        <?php $this->endWidget();?>
        </div>
        <div id="yw0">
            <ul id="yw1" class="nav nav nav-tabs ">
                <li class="active"><a data-toggle="tab" href="#yw0_tab_1">Gantt</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_2">Tasks (<?php echo $cTasks; ?>)</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_3">Notes &amp; Emails (<?php echo $cNotes; ?>)</a></li>                
            </ul>
            <div class="tab-content">
                <div id="yw0_tab_1" class="tab-pane fade active in">                
                    <?php $this->renderPartial('//task/ganttview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_2" class="tab-pane fade">                
                    <?php $this->renderPartial('//task/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_3" class="tab-pane fade">
                    <?php 
                    $this->renderPartial('//comment/tabview', array('model'=>$model, 'module'=>'project')); 
                    ?>
                </div>
                
            </div>
        </div>    
    </div>
	<div class="span4 sidebar">
        <h5>Contacts</h5>
        <?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        	'htmlOptions' => array('class'=>'contact-table'),
        	'rowCssClass'=>'mystyle',
            //'fixedHeader' => true,
            //'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
            'type' => 'bordered striped callout',
            'dataProvider' => $contactDataProvider,
            'responsiveTable' => true,
            'template' => "{items}",
            'columns' => array(
        		'firstname:html:First Name',
        		'lastname:html:Last Name',
                'number:html:Phone Number',
                'name:html:Type',
            ),
        ));
        
        $this->beginWidget('zii.widgets.CPortlet', array(
			'htmlOptions'=>array(
				'class'=>''
			)
		));
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'pills',
			'items'=>array(
				array('label'=>'Add Worklog', 'icon'=>'icon-plus', 'url'=>'javascript:return;','linkOptions'=>array('onclick'=>'renderCreateForm()')),
			),
		));
		$this->endWidget();
        ?>

        <?php 
             $this->renderPartial('//worklog/tabview', array('model'=>$model)); 
        ?>
	</div>
</div>


<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{
window.print();
}
</script> 

<?php 
 $this->renderPartial("//worklog/_ajax_create_form",array("model"=>Worklog::model()));
?>


