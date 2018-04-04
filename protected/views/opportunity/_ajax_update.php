<div id="opportunity-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#opportunity-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("opportunity/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#opportunity-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('opportunity-grid', {
                     
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
 
   $('#opportunity-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("opportunity/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#opportunity-update-modal-container').html(data); 
                 $('#opportunity-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
