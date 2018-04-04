<?php
/*
* @todo Need to figure out how to pass module to this.
*/

$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>array('/comment/create?module=company&id='.$model->id),'active'=>true),
	),
));

$commentData=Yii::app()->db->createCommand("
		select c.id, c.content, v.name as status, DATE_FORMAT(c.create_time,'%m-%d-%Y') as created, u.user_name as author
		from comment c
			left join valuelist v on c.status = v.value and v.module='comment' and v.field = 'status'
			left join users u on c.userid = u.id 
		where c.status='2' and c.module='. $module .' and c.ref_id='".$model->id."'")->queryAll();
		
$commentDataProvider = new CArrayDataProvider($commentData, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'comment-grid',
	'dataProvider'=>$commentDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'content:html:Note',
		'status:html:Status',
		'created:html:Create Date',
		'author:html:Created By',
		/*
		'url',
		'post_id',
		*/
            array('htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'viewButtonUrl'=>'Yii::app()->createUrl("/comment/view/", array("id"=>$data["id"]))',
                'updateButtonUrl'=>'Yii::app()->createUrl("/comment/update/", array("id"=>$data["id"]))',
                'deleteButtonUrl'=>'Yii::app()->createUrl("/comment/view/", array("id"=>$data["id"]))',
            ),        
	),
)); 

