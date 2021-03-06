<?php
/*
 * @todo Contacts company_id needs changed to company 
 */
function setStatus($intStatus, $Current){
		$intStatus = $intStatus;
		if ($Current < 4){
			if($intStatus == $Current){
				return 'info';
			}else{
				return '';
			}
		}
		if($intStatus == '4'){
			return 'danger';
		}
		if($intStatus == '5'){
			return 'danger';
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

function setVisible($intStatus, $Current, $id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("opportunity=$id");
		$proposal = Proposal::model()->findAll($criteria);
		
		if($proposal)return 'hidden btn-mini';
		
		$intStatus = (string)$intStatus;
		if($Current = '3' and $intStatus == '1'){
			return 'btn-mini';
		}else{
			return 'hidden btn-mini';
		}
}



$this->breadcrumbs=array(
	'Opportunities'=>array('index'),
	$model->name,
);
$history = Browsehistory::getInstance();
$history->push(null, $model->name, 'icon-globe');

        $addressData=Yii::app()->db->createCommand("SELECT * FROM address where module='company' and ref_id='".$model->company."'")->queryAll();
        $addressDataProvider = new CArrayDataProvider($addressData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>30,
                ),
        ));

		$contactData=Yii::app()->db->createCommand("SELECT * FROM contact where company_id='".$model->company."'")->queryAll();
		$contactDataProvider = new CArrayDataProvider($contactData, array(
			'keyField'=>'id',
			'pagination'=>array(
				'pageSize'=>30,
				),
		));

        $phoneData=Yii::app()->db->createCommand("
			SELECT p.id, p.number, v.name as type
			FROM phone p 
			left join valuelist v on p.type = v.value and v.module='phone'
			where p.module='company' and ref_id='".$model->company."'")->queryAll();
			
        $phoneDataProvider = new CArrayDataProvider($phoneData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>10,
                ),
        ));

        $id = $model->id;
        // Get Record Counts
        $cNotes = Comment::model()->count("module='opportunity' and ref_id = $id");
        $cContacts = Contact::model()->count('company_id=:company', array('company'=>$model->company));
        $cAddresses = Address::model()->count("module='opportunity' and ref_id = $id");
        $cProposal = Proposal::model()->count("opportunity=:opportunity", array("opportunity" => $id));
        
?>

<div class="row-fluid">
    <div class="span8">
        <?php 
        $this->beginWidget('bootstrap.widgets.TbBox', array(
			'title' => $model->name,
			'headerIcon' => 'icon-home',
			'headerButtons' => array(
        		/*array(
        			'class' => 'bootstrap.widgets.TbButton',
        			'label' => 'Edit',
        			'size'=>'mini', 
					'type'  => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'url'   =>	array('/opportunity/update/'.$model->id),
        			'htmlOptions' => array('class' => 'btn'),
				),*/
        		array(
			        'class' => 'bootstrap.widgets.TbButtonGroup',
					'buttons'=>array(
						array('label'=>'Closed Lost', 'type'=>setStatus($model->status, 4), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 4))),
						array('label'=>'Cancelled', 'type'=>setStatus($model->status, 5), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 5))),
					),
				),
				array(
			        'class' => 'bootstrap.widgets.TbButtonGroup',
					'buttons'=>array(
						array('label'=>'Create Proposal', 'type'=>'primary', 'url'=>'CreateProposal/'.$model->id,'htmlOptions' => array('class' =>setVisible(1, $model->status, $model->id))),
					),
				),
				array(
			        'class' => 'bootstrap.widgets.TbButtonGroup',
					'buttons'=>array(
						array('label'=>'Pending', 'type'=>setStatus($model->status, 1), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 1))),
						array('label'=>'Negotiating', 'type'=>setStatus($model->status, 2), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 2))),
						array('label'=>'Closed Won', 'type'=>setStatus($model->status, 3), 'url'=>'#', 'htmlOptions' => array('class' =>setClass($model->status, 3))),
					),
				),
				),			
		));

		?>
 				<div class="summary-table" id="yw2">
				<table class="items table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align:center" id="yw2_c0">Amount</th>
							<th style="text-align:center" id="yw2_c1">Probability</th>
							<th style="text-align:center" id="yw2_c2">Status</th>
							<th style="text-align:center" id="yw2_c3">Owner</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center"><?php echo Yii::app()->numberFormatter->formatCurrency($model->amount,'USD'); ?></td>
							<td style="text-align:center"><?php echo $model->rProbability->name; ?></td>
							<td style="text-align:center"><?php echo $model->rStatus->name; ?></td>
							<td style="text-align:center"><?php echo $model->rUsers->user_name; ?></td>
						</tr>
					</tbody>
				</table><div class="keys" style="display:none" title="/test/index.php/project/1"><span>1</span></div>
				</div>        		
        <?php $this->endWidget();?>
	    <?php /** @var BootActiveForm $form */
				$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'horizontalForm',
					'type'=>'vertical',
				)); ?>
			 
			    <fieldset>
               <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5),array('disabled'=>true)); ?>  
               </fieldset>
             <?php $this->endWidget(); ?>        
        <div id="yw0">
            <ul id="yw1" class="nav nav nav-tabs ">
                <li class="active"><a data-toggle="tab" href="#yw0_tab_1">Notes &amp; Emails (<?php echo $cNotes;?>)</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_2">Contacts (<?php echo $cContacts;?>)</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_3">Addresses (<?php echo $cAddresses;?>)</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_4">Proposal (<?php echo $cProposal;?>)</a></li>
            </ul>
            <div class="tab-content">
                <div id="yw0_tab_1" class="tab-pane fade active in">
                    <?php $this->renderPartial('//comment/tabview', array('model'=>$model, 'module'=>'opportunity')); ?>
                </div>
                <div id="yw0_tab_2" class="tab-pane fade">
                    <?php $this->renderPartial('//contact/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_3" class="tab-pane fade">
                    <?php $this->renderPartial('//address/tabview', array('model'=>$model)); ?>
                </div>
               <div id="yw0_tab_4" class="tab-pane fade">
                    <?php $this->renderPartial('//proposal/tabview', array('model'=>$model)); ?>
                </div>
            </div>
        </div>    
    </div>
	<div class="span4 sidebar">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'pills',
            'items'=>array(
                array('label'=>'Edit this Opportunity', 'icon'=>'icon-edit', 'url'=>array('/opportunity/update/'.$model->id),'active'=>true),
            ),
        ));
		?>
		<h3><?php echo $model->rCompanies->name;?></h3>
        <h5>Phone Numbers</h5>
        <?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'fixedHeader' => true,
            'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
            'type' => 'bordered striped',
            'dataProvider' => $phoneDataProvider,
            'responsiveTable' => true,
            'template' => "{items}",
            'columns' => array(
                'number:html:Phone Number',
                'type:html:Type',
            ),
        ));?>
        <?php $this->renderPartial('//task/sidebarview', array('model'=>$model)); ?>
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
