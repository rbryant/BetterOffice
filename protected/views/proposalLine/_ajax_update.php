<div id="proposal-line-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#proposal-line-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("proposal-line/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#proposal-line-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('proposal-line-grid', {
                     
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
 
   $('#proposal-line-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("proposal-line/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#proposal-line-update-modal-container').html(data); 
                 $('#proposal-line-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
