<div id="project-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#project-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("project/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#project-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('project-grid', {
                     
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
 
   $('#project-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("project/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#project-update-modal-container').html(data); 
                 $('#project-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
