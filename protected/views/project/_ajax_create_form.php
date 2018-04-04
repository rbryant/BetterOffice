
    <div id='project-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create project</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'project-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("project/create"),
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
					  <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'proposal'); ?>
					  <?php echo $form->textField($model,'proposal'); ?>
					  <?php echo $form->error($model,'proposal'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'user'); ?>
					  <?php echo $form->textField($model,'user'); ?>
					  <?php echo $form->error($model,'user'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'total'); ?>
					  <?php echo $form->textField($model,'total'); ?>
					  <?php echo $form->error($model,'total'); ?>
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
					  <?php echo $form->labelEx($model,'company'); ?>
					  <?php echo $form->textField($model,'company'); ?>
					  <?php echo $form->error($model,'company'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'budget'); ?>
					  <?php echo $form->textField($model,'budget'); ?>
					  <?php echo $form->error($model,'budget'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'percent_complete'); ?>
					  <?php echo $form->textField($model,'percent_complete'); ?>
					  <?php echo $form->error($model,'percent_complete'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'status'); ?>
					  <?php echo $form->textField($model,'status'); ?>
					  <?php echo $form->error($model,'status'); ?>
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
 
   var data=$("#project-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("project/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#project-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('project-grid', {
                     
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
  $('#project-create-form').each (function(){
  this.reset();
   });

  
  $('#project-view-modal').modal('hide');
  
  $('#project-create-modal').modal({
   show:true,
   
  });
}

</script>
