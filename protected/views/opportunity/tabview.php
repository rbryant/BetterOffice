<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>'javascript:return;','linkOptions'=>array('onclick'=>'renderCreateForm()')),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();


$opportunityDataProvider=new CActiveDataProvider('Opportunity', array(
    'criteria'=>array(
        'condition'=>'company='.$model->id,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$opportunityDataProvider->getData();

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'opportunity-grid',
	'dataProvider'=>$opportunityDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		'name',
		'description',
		'amount',
		'type',
		'category',
		'owner',
		'status',
		/*'change_date',
		'change_by',
		*/
	    array('htmlOptions' => array('nowrap'=>'nowrap'),
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl("/opportunity/view/", array("id"=>$data["id"]))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/opportunity/update/", array("id"=>$data["id"]))',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/opportunity/view/", array("id"=>$data["id"]))',
			),        
	),
)); 
