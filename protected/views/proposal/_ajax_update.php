<div id="proposal-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#proposal-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("proposal/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#proposal-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('proposal-grid', {
                     
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
 
   $('#proposal-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("proposal/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#proposal-update-modal-container').html(data); 
                 $('#proposal-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
