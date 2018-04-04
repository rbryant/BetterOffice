<?php
$this->breadcrumbs=array(
	'Proposal Lines'=>array('index'),
	$model->id,
);
?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catnum',
		'description',
		'quantity',
		'price',
		'time',
		'linecost',
		'taxable',
		'proposal',
	),
)); ?>

