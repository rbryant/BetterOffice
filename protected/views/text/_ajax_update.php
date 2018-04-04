<div id="text-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#text-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("text/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#text-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('text-grid', {
                     
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
 
   $('#text-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("text/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#text-update-modal-container').html(data); 
                 $('#text-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
