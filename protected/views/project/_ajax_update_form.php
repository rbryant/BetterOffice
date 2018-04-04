    <div id='project-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'project-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("project/update"),
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
					  <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'proposal'); ?>
					  <?php echo $form->textField($model,'proposal'); ?>
					  <?php echo $form->error($model,'proposal'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'user'); ?>
					  <?php echo $form->textField($model,'user'); ?>
					  <?php echo $form->error($model,'user'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'total'); ?>
					  <?php echo $form->textField($model,'total'); ?>
					  <?php echo $form->error($model,'total'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'startdate'); ?>
					  <?php echo $form->textField($model,'startdate'); ?>
					  <?php echo $form->error($model,'startdate'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'enddate'); ?>
					  <?php echo $form->textField($model,'enddate'); ?>
					  <?php echo $form->error($model,'enddate'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company'); ?>
					  <?php echo $form->textField($model,'company'); ?>
					  <?php echo $form->error($model,'company'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'budget'); ?>
					  <?php echo $form->textField($model,'budget'); ?>
					  <?php echo $form->error($model,'budget'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'percent_complete'); ?>
					  <?php echo $form->textField($model,'percent_complete'); ?>
					  <?php echo $form->error($model,'percent_complete'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
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



