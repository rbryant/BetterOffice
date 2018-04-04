    <div id='issue-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'issue-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("issue/update"),
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
					  <?php echo $form->labelEx($model,'title'); ?>
					  <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'title'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'description'); ?>
					  <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company_id'); ?>
					  <?php echo $form->textField($model,'company_id'); ?>
					  <?php echo $form->error($model,'company_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'assignedto'); ?>
					  <?php echo $form->textField($model,'assignedto'); ?>
					  <?php echo $form->error($model,'assignedto'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'create_date'); ?>
					  <?php echo $form->textField($model,'create_date'); ?>
					  <?php echo $form->error($model,'create_date'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'due_date'); ?>
					  <?php echo $form->textField($model,'due_date'); ?>
					  <?php echo $form->error($model,'due_date'); ?>
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



