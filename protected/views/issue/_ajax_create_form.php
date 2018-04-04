
    <div id='issue-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create issue</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'issue-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("issue/create"),
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
					  <?php echo $form->labelEx($model,'title'); ?>
					  <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'title'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'description'); ?>
					  <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company_id'); ?>
					  <?php echo $form->textField($model,'company_id'); ?>
					  <?php echo $form->error($model,'company_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'assignedto'); ?>
					  <?php echo $form->textField($model,'assignedto'); ?>
					  <?php echo $form->error($model,'assignedto'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'create_date'); ?>
					  <?php echo $form->textField($model,'create_date'); ?>
					  <?php echo $form->error($model,'create_date'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'due_date'); ?>
					  <?php echo $form->textField($model,'due_date'); ?>
					  <?php echo $form->error($model,'due_date'); ?>
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
 
   var data=$("#issue-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("issue/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#issue-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('issue-grid', {
                     
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
  $('#issue-create-form').each (function(){
  this.reset();
   });

  
  $('#issue-view-modal').modal('hide');
  
  $('#issue-create-modal').modal({
   show:true,
   
  });
}

</script>
