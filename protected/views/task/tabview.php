<?php 
$taskData=Yii::app()->db->createCommand("
		select t.id, t.name, DATE_FORMAT(t.startdate,'%m-%d-%Y') as start, DATE_FORMAT(t.enddate,'%m-%d-%Y') as due,
		t.quantity, t.time, r.name as assignedto, v.name as status
		from task t 
			left join valuelist v on t.status = v.value and v.module='comment' and v.field = 'status' 
			left join resource r on t.assignedto = r.id 
		where t.project = '".$model->id."'")->queryAll();
		
$taskDataProvider = new CArrayDataProvider($taskData, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));

/*
$projectDataProvider=new CActiveDataProvider('Task', array(
    'criteria'=>array(
        'condition'=>'project='.$model->id,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$projectDataProvider->getData();
*/

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'task', //-grid
	'dataProvider'=>$taskDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id:html:ID',
		'name:html:Task',
		//'start:html:Start',
		'due:html:Due',
		'assignedto:html:Assigned To',
		'quantity:html:Est. Hrs',
		'time:html:Act. Hrs',
		'status:html:Status',
	    array('htmlOptions' => array('nowrap'=>'nowrap'),
	    	
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/task/update/", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
			),
	),
)); 


		
