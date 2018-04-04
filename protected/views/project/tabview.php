<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>'Update', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id)), 'linkOptions'=>array()),
		array('label'=>'Print', 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),

)));
$this->endWidget();

$projectDataProvider=new CActiveDataProvider('Project', array(
    'criteria'=>array(
        'condition'=>'company='.$model->id,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$projectDataProvider->getData();

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'project-grid',
	'dataProvider'=>$projectDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		'name',
		'description',
		'proposal',
		'owner',
		'total',
	    array('htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/project/view/", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/project/update/", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/project/view/", array("id"=>$data["id"]))',
			),
	),
)); 


		
