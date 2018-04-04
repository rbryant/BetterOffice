<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'task-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'project', 
	                    CHtml::listData(project::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->datepickerRow($model,'startdate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>'))); ?>

	<?php echo $form->datepickerRow($model,'enddate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>'))); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'assignedto', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'user_name')),
		                    'id', 
		                    'user_name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'time', 
	                    CHtml::listData(time::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'module',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'ref_id', 
	                    CHtml::listData(ref_id::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'status', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Task',':field'=>'status')),
		                    'value', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'percent_complete',array('class'=>'span5')); ?>

                        </div>   
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
