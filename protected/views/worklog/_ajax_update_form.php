    <div id='worklog-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'worklog-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("worklog/update"),
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
					  <?php echo $form->labelEx($model,'task'); ?>
					  <?php echo $form->textField($model,'task'); ?>
					  <?php echo $form->error($model,'task'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'resource'); ?>
					  <?php echo $form->textField($model,'resource'); ?>
					  <?php echo $form->error($model,'resource'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'hours'); ?>
					  <?php echo $form->textField($model,'hours'); ?>
					  <?php echo $form->error($model,'hours'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'workdate'); ?>
					  <?php echo $form->textField($model,'workdate'); ?>
					  <?php echo $form->error($model,'workdate'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'log'); ?>
					  <?php echo $form->textArea($model,'log',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'log'); ?>
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



