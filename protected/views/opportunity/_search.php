<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-opportunity-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span8', 'maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'type', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Opportunity',':field'=>'type')),
		                    'value', 
		                    'name'), 
                            array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'category', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Opportunity',':field'=>'category')),
		                    'value', 
		                    'name'), 
                            array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'owner', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'status', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Opportunity',':field'=>'status')),
		                    'value', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->textFieldRow($model,'change_date',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'change_by', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'company', 
	                    CHtml::listData(company::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value')); ?>

	<?php echo $form->dropDownListRow(
	                    $model,
	                    'probability', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'Opportunity',':field'=>'probability')),
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
		$(":input","#search-opportunity-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

