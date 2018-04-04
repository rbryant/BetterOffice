<div id="issue-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#issue-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("issue/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#issue-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('issue-grid', {
                     
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
 
   $('#issue-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("issue/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#issue-update-modal-container').html(data); 
                 $('#issue-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
