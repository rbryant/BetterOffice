
    <div id='cronjob-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create cronjob</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cronjob-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("cronjob/create"),
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
					  <?php echo $form->labelEx($model,'execute_after'); ?>
					  <?php echo $form->textField($model,'execute_after'); ?>
					  <?php echo $form->error($model,'execute_after'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'executed_at'); ?>
					  <?php echo $form->textField($model,'executed_at'); ?>
					  <?php echo $form->error($model,'executed_at'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'succeeded'); ?>
					  <?php echo $form->textField($model,'succeeded'); ?>
					  <?php echo $form->error($model,'succeeded'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'action'); ?>
					  <?php echo $form->textArea($model,'action',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'action'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'parameters'); ?>
					  <?php echo $form->textArea($model,'parameters',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'parameters'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'execution_result'); ?>
					  <?php echo $form->textArea($model,'execution_result',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'execution_result'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'frequency'); ?>
					  <?php echo $form->textField($model,'frequency'); ?>
					  <?php echo $form->error($model,'frequency'); ?>
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
 
   var data=$("#cronjob-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("cronjob/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#cronjob-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('cronjob-grid', {
                     
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
  $('#cronjob-create-form').each (function(){
  this.reset();
   });

  
  $('#cronjob-view-modal').modal('hide');
  
  $('#cronjob-create-modal').modal({
   show:true,
   
  });
}

</script>
