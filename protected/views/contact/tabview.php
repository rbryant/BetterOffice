<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>array('/contact/create?module=company&id='.$model->id),'active'=>true),
	),
));
$this->endWidget();

$contactData=Yii::app()->db->createCommand("
		SELECT c.id, c.firstname, c.lastname, c.title, p.number
		from contact c left join phone p
		on c.id = p.contact where c.lastname is not null and company='".$model->id."'")->queryAll();
		
$contactDataProvider = new CArrayDataProvider($contactData, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));


$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'contact-grid',
	'dataProvider'=>$contactDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id:html:ID',
		'firstname:html:First Name',
		'lastname:html:Last Name',
		'title:html:Title',
		'number:html:Phone Number',
	    array('htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/contact/view/", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/contact/update/", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/contact/view/", array("id"=>$data["id"]))',
			),
        
	),
)); 
