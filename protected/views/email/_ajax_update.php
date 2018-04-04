<div id="email-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#email-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("email/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#email-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('email-grid', {
                     
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
 
   $('#email-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("email/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#email-update-modal-container').html(data); 
                 $('#email-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
