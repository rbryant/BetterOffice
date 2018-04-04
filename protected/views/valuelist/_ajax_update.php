<div id="valuelist-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#valuelist-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("valuelist/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#valuelist-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('valuelist-grid', {
                     
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
 
   $('#valuelist-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("valuelist/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#valuelist-update-modal-container').html(data); 
                 $('#valuelist-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
