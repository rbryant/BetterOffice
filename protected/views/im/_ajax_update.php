<div id="im-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#im-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("im/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#im-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('im-grid', {
                     
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
 
   $('#im-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("im/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#im-update-modal-container').html(data); 
                 $('#im-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
