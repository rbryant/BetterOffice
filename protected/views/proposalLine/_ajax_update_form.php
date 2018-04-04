    <div id='proposal-line-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-line-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("proposal-line/update"),
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
					  <?php echo $form->labelEx($model,'catnum'); ?>
					  <?php echo $form->textField($model,'catnum'); ?>
					  <?php echo $form->error($model,'catnum'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'description'); ?>
					  <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'quantity'); ?>
					  <?php echo $form->textField($model,'quantity'); ?>
					  <?php echo $form->error($model,'quantity'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'price'); ?>
					  <?php echo $form->textField($model,'price'); ?>
					  <?php echo $form->error($model,'price'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'time'); ?>
					  <?php echo $form->textField($model,'time'); ?>
					  <?php echo $form->error($model,'time'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'linecost'); ?>
					  <?php echo $form->textField($model,'linecost'); ?>
					  <?php echo $form->error($model,'linecost'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'taxable'); ?>
					  <?php echo $form->textField($model,'taxable',array('size'=>1,'maxlength'=>1)); ?>
					  <?php echo $form->error($model,'taxable'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'proposal'); ?>
					  <?php echo $form->textField($model,'proposal'); ?>
					  <?php echo $form->error($model,'proposal'); ?>
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



