<div id="websites-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#websites-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("websites/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#websites-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('websites-grid', {
                     
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
 
   $('#websites-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("websites/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#websites-update-modal-container').html(data); 
                 $('#websites-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
