
    <div id='im-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create Ajaxtest</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'im-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("im/create"),
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
					  <?php echo $form->labelEx($model,'account'); ?>
					  <?php echo $form->textField($model,'account',array('size'=>20,'maxlength'=>20)); ?>
					  <?php echo $form->error($model,'account'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'type'); ?>
					  <?php echo $form->textField($model,'type'); ?>
					  <?php echo $form->error($model,'type'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'location'); ?>
					  <?php echo $form->textField($model,'location'); ?>
					  <?php echo $form->error($model,'location'); ?>
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
 
   var data=$("#im-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("im/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#im-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('im-grid', {
                     
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
  $('#im-create-form').each (function(){
  this.reset();
   });

  
  $('#im-view-modal').modal('hide');
  
  $('#im-create-modal').modal({
   show:true,
   
  });
}

</script>
