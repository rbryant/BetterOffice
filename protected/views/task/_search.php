<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-task-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'project', 
	                    CHtml::listData(project::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->datepickerRow($model,'startdate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>')); ?>

	<?php echo $form->datepickerRow($model,'enddate',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'assignedto', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'user_name')),
		                    'id', 
		                    'user_name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'status', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Task',':field'=>'status')),
		                    'value', 
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
		$(":input","#search-task-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

