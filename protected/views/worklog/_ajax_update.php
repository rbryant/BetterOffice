<div id="worklog-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#worklog-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("worklog/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#worklog-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('worklog-grid', {
                     
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
 
   $('#worklog-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("worklog/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#worklog-update-modal-container').html(data); 
                 $('#worklog-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
