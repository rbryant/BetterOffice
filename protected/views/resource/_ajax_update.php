<div id="resource-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#resource-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("resource/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#resource-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('resource-grid', {
                     
                         });
                 }
                 
              },
   error: function(data) { // if error occured
          alert(JSON.stringify(data)); 

    },

  dataType:'html'
  });

}

function renderUpdateForm(id)
{
 
   $('#resource-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("resource/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#resource-update-modal-container').html(data); 
                 $('#resource-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
