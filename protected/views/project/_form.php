<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'project-form',
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

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'proposal', 
	                    CHtml::listData(proposal::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'user', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'user_name')),
		                    'id', 
		                    'user_name')); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5')); ?>

	<?php echo $form->datepickerRow($model,'startdate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>')); ?>

	<?php echo $form->datepickerRow($model,'enddate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'company', 
	                    CHtml::listData(company::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name')); ?>

	<?php echo $form->textFieldRow($model,'budget',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'percent_complete',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'status', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Project',':field'=>'status')),
		                    'value', 
		                    'name')); ?>

                        </div>   
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
            'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
            'icon'=>'reset',  
			'label'=>'Reset',
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
