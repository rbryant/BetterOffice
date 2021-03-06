
    <div id='resource-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create resource</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'resource-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("resource/create"),
	'type'=>'horizontal',
	'htmlOptions'=>array(
	                        'onsubmit'=>"return false;",/* Disable normal form submit */
                            ),
          'clientOptions'=>array(
                    'validateOnType'=>true,
                    'validateOnSubmit'=>true,
                    'afterValidate'=>'js:function(form, data, hasError) {
                                     if (!hasError)
                                        {    
                                          create();
                                        }
                                     }'
                                    

            ),                  
  
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
			
							  <div class="row">
					  <?php echo $form->labelEx($model,'name'); ?>
					  <?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
					  <?php echo $form->error($model,'name'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company'); ?>
					  <?php echo $form->textField($model,'company'); ?>
					  <?php echo $form->error($model,'company'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'email'); ?>
					  <?php echo $form->textField($model,'email'); ?>
					  <?php echo $form->error($model,'email'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'payrate'); ?>
					  <?php echo $form->textField($model,'payrate'); ?>
					  <?php echo $form->error($model,'payrate'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'userid'); ?>
					  <?php echo $form->textField($model,'userid'); ?>
					  <?php echo $form->error($model,'userid'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'billrate'); ?>
					  <?php echo $form->textField($model,'billrate'); ?>
					  <?php echo $form->error($model,'billrate'); ?>
				  </div>

			  
                        </div>   
  </div>

  </div><!--end modal body-->
  
  <div class="modal-footer">
	<div class="form-actions">

		<?php
		
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)
			
		);
		
		?>
              <?php
 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div> 
   </div><!--end modal footer-->	
</fieldset>

<?php
 $this->endWidget(); ?>

</div>

</div><!--end modal-->

<script type="text/javascript">
function create()
 {
 
   var data=$("#resource-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("resource/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#resource-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('resource-grid', {
                     
                         });
                   
                 }
                 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },

  dataType:'html'
  });

}

function renderCreateForm()
{
  $('#resource-create-form').each (function(){
  this.reset();
   });

  
  $('#resource-view-modal').modal('hide');
  
  $('#resource-create-modal').modal({
   show:true,
   
  });
}

</script>
