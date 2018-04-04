
    <div id='meeting-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create meeting</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'meeting-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("meeting/create"),
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
					  <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
					  <?php echo $form->error($model,'name'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'location'); ?>
					  <?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>64)); ?>
					  <?php echo $form->error($model,'location'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'activity_id'); ?>
					  <?php echo $form->textField($model,'activity_id',array('size'=>11,'maxlength'=>11)); ?>
					  <?php echo $form->error($model,'activity_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'category_id'); ?>
					  <?php echo $form->textField($model,'category_id',array('size'=>11,'maxlength'=>11)); ?>
					  <?php echo $form->error($model,'category_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'description'); ?>
					  <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
					  <?php echo $form->error($model,'description'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'startdatetime'); ?>
					  <?php echo $form->textField($model,'startdatetime'); ?>
					  <?php echo $form->error($model,'startdatetime'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'enddatetime'); ?>
					  <?php echo $form->textField($model,'enddatetime'); ?>
					  <?php echo $form->error($model,'enddatetime'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'url'); ?>
					  <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
					  <?php echo $form->error($model,'url'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'attendee'); ?>
					  <?php echo $form->textField($model,'attendee'); ?>
					  <?php echo $form->error($model,'attendee'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'company'); ?>
					  <?php echo $form->textField($model,'company'); ?>
					  <?php echo $form->error($model,'company'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'project'); ?>
					  <?php echo $form->textField($model,'project'); ?>
					  <?php echo $form->error($model,'project'); ?>
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
 
   var data=$("#meeting-create-form").serialize();
     


  $.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("meeting/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#meeting-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('meeting-grid', {
                     
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
  $('#meeting-create-form').each (function(){
  this.reset();
   });

  
  $('#meeting-view-modal').modal('hide');
  
  $('#meeting-create-modal').modal({
   show:true,
   
  });
}

</script>
