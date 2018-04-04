<div id="comment-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#comment-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("comment/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#comment-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('comment-grid', {
                     
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
 
   $('#comment-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("comment/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#comment-update-modal-container').html(data); 
                 $('#comment-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
