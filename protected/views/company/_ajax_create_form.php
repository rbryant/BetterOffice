
    <div id='company-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create company</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
   $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'company-create-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("company/create"),
        'type'=>'horizontal',
        'htmlOptions'=>array('onsubmit'=>"return false;",/* Disable normal form submit */),
        'clientOptions'=>array(
                    'validateOnType'=>true,
                    'validateOnSubmit'=>true,
                    'afterValidate'=>'js:function(form, data, hasError) {
                        if (!hasError)
                           {    
                             create();
                           }
                        else
                        {
                            alert("Error occured.please try again");
                        }
                    }'
            ),                  
  
        )); 
    ?>
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
					  <?php echo $form->labelEx($model,'address'); ?>
					  <?php echo $form->textField($model,'address'); ?>
					  <?php echo $form->error($model,'address'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'social'); ?>
					  <?php echo $form->textField($model,'social'); ?>
					  <?php echo $form->error($model,'social'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'website'); ?>
					  <?php echo $form->textField($model,'website'); ?>
					  <?php echo $form->error($model,'website'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'manager'); ?>
					  <?php echo $form->textField($model,'manager',array('size'=>20,'maxlength'=>20)); ?>
					  <?php echo $form->error($model,'manager'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'create_date'); ?>
					  <?php echo $form->textField($model,'create_date'); ?>
					  <?php echo $form->error($model,'create_date'); ?>
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
    var data=$("#company-create-form").serialize();
    $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("company/create"); ?>',
    data:data,
    success:function(data){
                alert("success:" + data); 
                if(data!="false")
                {
                    $('#company-create-modal').modal('hide');
                    renderView(data);
                    $.fn.yiiGridView.update('company-grid', {    });
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
  $('#company-create-form').each (function(){
  this.reset();
   });

  
  $('#company-view-modal').modal('hide');
  
  $('#company-create-modal').modal({
   show:true,
   
  });
}

</script>
