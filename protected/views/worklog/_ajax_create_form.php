
    <div id='worklog-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create worklog</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'worklog-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("worklog/create"),
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
 
   var data=$("#worklog-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("worklog/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#worklog-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('worklog-grid', {
                     
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
  $('#worklog-create-form').each (function(){
  this.reset();
   });

  
  $('#worklog-view-modal').modal('hide');
  
  $('#worklog-create-modal').modal({
   show:true,
   
  });
}

</script>
