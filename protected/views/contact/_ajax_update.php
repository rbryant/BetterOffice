<div id="contact-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#contact-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("contact/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#contact-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('contact-grid', {
                     
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
 
   $('#contact-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("contact/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#contact-update-modal-container').html(data); 
                 $('#contact-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
