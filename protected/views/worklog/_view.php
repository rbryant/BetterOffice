<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task')); ?>:</b>
	<?php echo CHtml::encode($data->task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resource')); ?>:</b>
	<?php echo CHtml::encode($data->resource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hours')); ?>:</b>
	<?php echo CHtml::encode($data->hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workdate')); ?>:</b>
	<?php echo CHtml::encode($data->workdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log')); ?>:</b>
	<?php echo CHtml::encode($data->log); ?>
	<br />


</div>