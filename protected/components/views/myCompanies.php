<?php 

$maxPortletRecords = $this->maxPortletRecords;
$userid = Yii::app()->user->id;

$data = new CActiveDataProvider('Company', array(
    'criteria'=>array(
        'condition'=>'manager = "'.$userid.'"',
		'limit'=>$maxPortletRecords,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'task-grid',
	'type' => 'striped bordered',
	'dataProvider' =>$data ,
	'template' => "{items}",
	'columns'=>array(
		array
		(
			'class'=>'CButtonColumn',
			'template'=>'{look}',
			'buttons'=>array
			(
				'look' => array
				(
					'label'=>'View',
					'options'=>array('class'=>'btn btn-primary btn-mini'),
					'url'=>'Yii::app()->createUrl("company/view", array("id"=>$data->id))',
				),
			),
		),
		'company_name',
        //array('htmlOptions' => array('nowrap'=>'nowrap'),
		//'class'=>'bootstrap.widgets.TbButtonColumn',
		//'viewButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
		//'updateButtonUrl'=>'Yii::app()->createUrl("/task/update/", array("id"=>$data["id"]))',
		//'deleteButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
        //    ),
		)
));

?>
