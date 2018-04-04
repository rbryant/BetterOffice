<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->company_name,
);
$history = Browsehistory::getInstance();
$history->push(null, $model->company_name, 'icon-globe');

        $addressData=Yii::app()->db->createCommand("SELECT * FROM address where module='company' and ref_id='".$model->id."'")->queryAll();
        $addressDataProvider = new CArrayDataProvider($addressData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>30,
                ),
        ));

		$contactData=Yii::app()->db->createCommand("SELECT * FROM contact where company_id='".$model->id."'")->queryAll();
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
			where p.module='company' and ref_id='".$model->id."'")->queryAll();
			
        $phoneDataProvider = new CArrayDataProvider($phoneData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>10,
                ),
        ));


?>

<div class="row-fluid">
    <div class="span8">
        <h3><?php echo $model->company_name;?></h3>
            <h5>Background info <span>(bio, how you met, etc)</span></h5>
            <textarea cols="400" id="company_background" name="company[background]" rows="5" style="width:500px">
                <?php $model->description;?>
            </textarea>        
        <div id="yw0">
            <ul id="yw1" class="nav nav nav-tabs ">
                <li class="active"><a data-toggle="tab" href="#yw0_tab_1">Notes &amp; Emails</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_2">Contacts</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_3">Addresses</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_4">Opportunities</a></li>
                <li class=""><a data-toggle="tab" href="#yw0_tab_5">Projects</a></li>       
            </ul>
            <div class="tab-content">
                <div id="yw0_tab_1" class="tab-pane fade active in">
                    <?php $this->renderPartial('//comment/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_2" class="tab-pane fade">
                    <?php $this->renderPartial('//contact/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_3" class="tab-pane fade">
                    <?php $this->renderPartial('//address/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_4" class="tab-pane fade">
                    <?php $this->renderPartial('//opportunity/tabview', array('model'=>$model)); ?>
                </div>
                <div id="yw0_tab_5" class="tab-pane fade">
                    <?php $this->renderPartial('//project/tabview', array('model'=>$model)); ?>
                </div>
            </div>
        </div>    
    </div>
	<div class="span4 sidebar">
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'pills',
            'items'=>array(
                array('label'=>'Edit this Company', 'icon'=>'icon-edit', 'url'=>array('/company/update/'.$model->id),'active'=>true),
            ),
        ));
		?>
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
