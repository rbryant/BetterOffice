
    <div id='opportunity-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create opportunity</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'opportunity-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("opportunity/create"),
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
 
   var data=$("#opportunity-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("opportunity/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#opportunity-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('opportunity-grid', {
                     
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
  $('#opportunity-create-form').each (function(){
  this.reset();
   });

  
  $('#opportunity-view-modal').modal('hide');
  
  $('#opportunity-create-modal').modal({
   show:true,
   
  });
}

</script>
