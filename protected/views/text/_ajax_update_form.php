    <div id='text-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'text-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("text/update"),
	'type'=>'horizontal',
	'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ update(); } " /* Do ajax call when user presses enter key */
                            ),               
	
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
			
			<?php echo $form->hiddenField($model,'id',array()); ?>
			
	               				  <div class="row">
					  <?php echo $form->labelEx($model,'text'); ?>
					  <?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'text'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'ref'); ?>
					  <?php echo $form->textField($model,'ref'); ?>
					  <?php echo $form->error($model,'ref'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'module'); ?>
					  <?php echo $form->textField($model,'module'); ?>
					  <?php echo $form->error($model,'module'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'name'); ?>
					  <?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
					  <?php echo $form->error($model,'name'); ?>
				  </div>

			  
                        </div>   
  </div>

  </div><!--end modal body-->
  
  <div class="modal-footer">
	<div class="form-actions">

	                
		<?php		
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'id'=>'sub2',
			'type'=>'primary',
                        'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'htmlOptions'=>array('onclick'=>'update();'),
		));
		
		?>
             
	</div> 
   </div><!--end modal footer-->	
</fieldset>

<?php $this->endWidget(); ?>

</div>


</div><!--end modal-->



