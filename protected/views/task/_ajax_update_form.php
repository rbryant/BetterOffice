    <div id='task-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'task-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("task/update"),
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
					  <?php echo $form->labelEx($model,'project'); ?>
					  <?php echo $form->textField($model,'project'); ?>
					  <?php echo $form->error($model,'project'); ?>
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
					  <?php echo $form->labelEx($model,'assignedto'); ?>
					  <?php echo $form->textField($model,'assignedto'); ?>
					  <?php echo $form->error($model,'assignedto'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'quantity'); ?>
					  <?php echo $form->textField($model,'quantity'); ?>
					  <?php echo $form->error($model,'quantity'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'time'); ?>
					  <?php echo $form->textField($model,'time'); ?>
					  <?php echo $form->error($model,'time'); ?>
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

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'percent_complete'); ?>
					  <?php echo $form->textField($model,'percent_complete'); ?>
					  <?php echo $form->error($model,'percent_complete'); ?>
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



