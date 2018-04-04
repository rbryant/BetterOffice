<div id="social-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#social-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("social/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#social-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('social-grid', {
                     
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
 
   $('#social-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("social/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#social-update-modal-container').html(data); 
                 $('#social-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
