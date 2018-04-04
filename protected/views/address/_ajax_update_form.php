    <div id='address-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'address-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("address/update"),
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
					  <?php echo $form->labelEx($model,'address1'); ?>
					  <?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'address1'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'address2'); ?>
					  <?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'address2'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'city'); ?>
					  <?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
					  <?php echo $form->error($model,'city'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'state'); ?>
					  <?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
					  <?php echo $form->error($model,'state'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'zip'); ?>
					  <?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
					  <?php echo $form->error($model,'zip'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'module'); ?>
					  <?php echo $form->textField($model,'module',array('size'=>20,'maxlength'=>20)); ?>
					  <?php echo $form->error($model,'module'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'ref_id'); ?>
					  <?php echo $form->textField($model,'ref_id'); ?>
					  <?php echo $form->error($model,'ref_id'); ?>
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



