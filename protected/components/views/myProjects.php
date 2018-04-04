<?php 

$maxPortletRecords = $this->maxPortletRecords;
$userid = Yii::app()->user->id;

$data = new CActiveDataProvider('Project', array(
    'criteria'=>array(
        'condition'=>'user = "'.$userid.'"',
		'order'=>'enddate ASC',
		'limit'=>$maxPortletRecords,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>5,
    ),
));

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'task-grid-portlet',
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
					'url'=>'Yii::app()->createUrl("project/view", array("id"=>$data->id))',
				),
			),
		),
		'name',
		array(
            'name' => 'budget',
            'header' => 'Budget',
            'value'=> 'Yii::app()->numberFormatter->formatCurrency($data->budget,"USD")'
	        ),		
		),
));

?>
