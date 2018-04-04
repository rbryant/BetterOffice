   <div class=" wideform">
   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'comment-create-form',
		'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("//comment/create"),
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
  
)); 

$userId = Yii::app()->user->id;
$timestamp = date('Y/m/d h:m:s');
?>
	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div id="content-area" class="row-fluid SocialItemInlineEditView InlineEditView EditView DetailsView ModelView ConfigurableMetadataView MetadataView">		
			<div class="span12">
					  <?php echo $form->textArea($model,'content',array('rows'=>3, 'cols'=>50, 'class'=>'span12')); ?>
					  <input type="hidden" name="Comment[status]" id="Comment_status" type="text" value="2">					  
					  <input type="hidden" name="Comment[create_time]" id="Comment_create_time" type="text" value="<?php echo $timestamp; ?>">					  
					  <input type="hidden" size="60" maxlength="128" name="Comment[userId]" id="Comment_userId" type="text" 
					  value="<?php echo $userId; ?>">	
					  <input type="hidden" name="Comment[ref_id]" id="Comment_ref_id" type="text" value="1">					  
					  <input type="hidden" size="20" maxlength="20" name="Comment[module]" id="Comment_module" type="text" value="comment">		

           </div>
           <div class="view-toolbar-container clearfix">
		<div id='facebook' style="display:none;">
             <div id='block_1' class='facebook_block'></div>
             <div id='block_2' class='facebook_block'></div>
             <div id='block_3' class='facebook_block'></div>
		</div>
		<?php
		
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)
			
		);
		
		?></div>
  </div>
</div>
<?php
 $this->endWidget(); ?>

<script type="text/javascript">
function create()
 {
   $("#facebook").show();
   var data=$("#comment-create-form").serialize();
   
  $.ajax({
   type: 'POST',
   url: '<?php echo Yii::app()->createAbsoluteUrl("comment/create"); ?>',
   data:data,
   success:function(data){
                alert("success: "+data); 
                if(data!="false")
                 {
                  $("#facebook").hide();
                  //renderView(data);
                  //  $.fn.yiiGridView.update('comment-grid', {});
                     
                  //       
                   
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
  $('#comment-create-form').each (function(){
  this.reset();
   });
}

</script>
