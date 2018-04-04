<div id="cronjob-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#cronjob-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cronjob/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#cronjob-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('cronjob-grid', {
                     
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
 
   $('#cronjob-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cronjob/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#cronjob-update-modal-container').html(data); 
                 $('#cronjob-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
