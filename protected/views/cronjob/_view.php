<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('execute_after')); ?>:</b>
	<?php echo CHtml::encode($data->execute_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executed_at')); ?>:</b>
	<?php echo CHtml::encode($data->executed_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('succeeded')); ?>:</b>
	<?php echo CHtml::encode($data->succeeded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parameters')); ?>:</b>
	<?php echo CHtml::encode($data->parameters); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('execution_result')); ?>:</b>
	<?php echo CHtml::encode($data->execution_result); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency')); ?>:</b>
	<?php echo CHtml::encode($data->frequency); ?>
	<br />

	*/ ?>

</div>