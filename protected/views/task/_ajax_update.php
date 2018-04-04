<div id="task-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#task-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("task/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#task-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('task-grid', {
                     
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
 
   $('#task-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("task/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#task-update-modal-container').html(data); 
                 $('#task-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
