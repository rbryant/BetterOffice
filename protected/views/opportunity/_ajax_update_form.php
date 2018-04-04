    <div id='opportunity-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'opportunity-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("opportunity/update"),
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
					  <?php echo $form->labelEx($model,'name'); ?>
					  <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'name'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'description'); ?>
					  <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'amount'); ?>
					  <?php echo $form->textField($model,'amount'); ?>
					  <?php echo $form->error($model,'amount'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'type'); ?>
					  <?php echo $form->textField($model,'type'); ?>
					  <?php echo $form->error($model,'type'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'category'); ?>
					  <?php echo $form->textField($model,'category'); ?>
					  <?php echo $form->error($model,'category'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'owner'); ?>
					  <?php echo $form->textField($model,'owner'); ?>
					  <?php echo $form->error($model,'owner'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'change_date'); ?>
					  <?php echo $form->textField($model,'change_date'); ?>
					  <?php echo $form->error($model,'change_date'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'change_by'); ?>
					  <?php echo $form->textField($model,'change_by'); ?>
					  <?php echo $form->error($model,'change_by'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company'); ?>
					  <?php echo $form->textField($model,'company'); ?>
					  <?php echo $form->error($model,'company'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'probability'); ?>
					  <?php echo $form->textField($model,'probability'); ?>
					  <?php echo $form->error($model,'probability'); ?>
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



