<div id="phone-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#phone-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("phone/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#phone-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('phone-grid', {
                     
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
 
   $('#phone-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("phone/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#phone-update-modal-container').html(data); 
                 $('#phone-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
