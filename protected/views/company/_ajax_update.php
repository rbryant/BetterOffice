<div id="company-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#company-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("company/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#company-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('company-grid', {
                     
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
 
   $('#company-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("company/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#company-update-modal-container').html(data); 
                 $('#company-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
