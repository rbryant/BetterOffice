<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Create',
);

?>
<div class="container-fluid page-title">
        <div class="navigation clearfix navbar-extra">
            <div class="row">
                <div class="span9">
                    <div class="pull-left">
                        <div class="container-fluid">
                            <h1 class="oro-subtitle">Create a Company</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="container-fluid">
    <div class="grid-container">
    <?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array(), 'visible'=>Yii::app()->user->checkAccess('CompanyAdd_Access')),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
	),
));
$this->endWidget();
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>