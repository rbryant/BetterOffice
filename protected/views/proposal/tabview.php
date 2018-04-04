<?php 
$ref_id = $model->id;

$proposalDataProvider=new CActiveDataProvider('Proposal', array(
    'criteria'=>array(
        'condition'=>'opportunity='.$ref_id,
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$proposalDataProvider->getData();

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'address-grid',
	'dataProvider'=>$proposalDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array(
			'header' => '',
       		'value' => function($data)
		        {
		            $this->widget('bootstrap.widgets.TbButton',array(
						'label' => 'View',
						'type' => 'primary',
						'size' => 'mini',
		            	'url'=>Yii::app()->createUrl("/proposal/view/", array("id"=>$data["id"])),
		            	'htmlOptions'=>array('style'=>'margin:0px;'),
					));
		        },
		    	'htmlOptions'=>array('width'=>'62px;'),
		    ),
		'name',
		'description',
		'company',
		'total',
	),
)); 

