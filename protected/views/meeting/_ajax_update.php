<div id="meeting-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#meeting-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("meeting/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#meeting-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('meeting-grid', {
                     
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
 
   $('#meeting-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("meeting/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#meeting-update-modal-container').html(data); 
                 $('#meeting-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
