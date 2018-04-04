<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-cronjob-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


	<?php echo $form->dropDownListRow(
	                    $model,
	                    'id', 
	                    CHtml::listData(id::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'execute_after',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'executed_at',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'succeeded', 
	                    CHtml::listData(succeeded::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'action',array('class'=>'span8', 'maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'parameters',array('class'=>'span8', 'maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'execution_result',array('class'=>'span8', 'maxlength'=>128)); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'frequency', 
	                    CHtml::listData(frequency::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')); ?>
               <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset', 'htmlOptions'=>array('class'=>'btnreset btn-small'))); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/jquery-ui-bootstrap.css');

?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","#search-cronjob-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

