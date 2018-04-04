<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
      array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>'javascript:return;','linkOptions'=>array('onclick'=>'renderCreateForm()'),'active'=>true),
	),
));
$this->endWidget();

$module = 'company';
$ref_id = $model->id;

$addressDataProvider=new CActiveDataProvider('Address', array(
    'criteria'=>array(
        'condition'=>'module="'.$module.'" and ref_id='.$ref_id,
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$addressDataProvider->getData();

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'address-grid',
	'dataProvider'=>$addressDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		/*
		'module',
		'ref_id',
		*/
	    array('htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/address/view/", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/address/update/", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/address/view/", array("id"=>$data["id"]))',
			),
        
	),
)); 


echo CHtml::ajaxLink(Yii::t('job','ADD NEW ADDRESS'),array('address/DialogCreate'),array(
        'success'=>'js:function(data){
      		$("#jobDialog").dialog("open");
    		document.getElementById("add_address").innerHTML=data;
		}'
));

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('job','Create Address'),
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
 

 echo "<div id='add_address'></div>";
 
 $this->endWidget('zii.widgets.jui.CJuiDialog');