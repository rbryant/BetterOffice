
    <div id='address-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create New Address</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
$module = Yii::app()->getRequest()->getQuery('module');
$ref_id = Yii::app()->getRequest()->getQuery('id');
   
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'address-create-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'method'=>'post',
	'action'=>array("address/create"),
	'type'=>'horizontal',
	'htmlOptions'=>array(
	          'clientOptions'=>array(
                    'validateOnType'=>true,
                    'validateOnSubmit'=>true,
                    'afterValidate'=>'js:function(form, data, hasError) {
                                     if (!hasError)
                                        {    
                                          create();
                                        }
                                     }',
		            ),                  
			)
		)
	); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
			
							  <div class="row">
					  <?php echo $form->labelEx($model,'address1'); ?>
					  <?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'address1'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'address2'); ?>
					  <?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'address2'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'city'); ?>
					  <?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
					  <?php echo $form->error($model,'city'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'state'); ?>
					  <?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
					  <?php echo $form->error($model,'state'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'zip'); ?>
					  <?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
					  <?php echo $form->error($model,'zip'); ?>
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
 
   var data=$("#address-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("address/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#address-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('address-grid', {
                     
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
  $('#address-create-form').each (function(){
  this.reset();
   });

  
  $('#address-view-modal').modal('hide');
  
  $('#address-create-modal').modal({
   show:true,
   
  });
}

</script>
