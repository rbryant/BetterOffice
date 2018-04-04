<?php 

$maxPortletRecords = $this->maxPortletRecords;
$userid = Yii::app()->user->id;

$data = new CActiveDataProvider('Opportunity', array(
    'criteria'=>array(
        'condition'=>'owner = "'.$userid.'"',
		//'order'=>'enddate ASC',
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
					'url'=>'Yii::app()->createUrl("opportunity/view", array("id"=>$data->id))',
				),
			),
		),
		'name',
		array(
            'name' => 'amount',
            'header' => 'Amount',
            //'class' => 'bootstrap.widgets.TbTotalSumColumn',
            'value'=> 'Yii::app()->numberFormatter->formatCurrency($data->amount,"USD")'
        ),
		//'duedate',
        //array('htmlOptions' => array('nowrap'=>'nowrap'),
		//'class'=>'bootstrap.widgets.TbButtonColumn',
		//'viewButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
		//'updateButtonUrl'=>'Yii::app()->createUrl("/task/update/", array("id"=>$data["id"]))',
		//'deleteButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
        //    ),
		)
));

?>
