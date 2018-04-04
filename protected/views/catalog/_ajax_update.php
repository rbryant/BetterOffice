<div id="catalog-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#catalog-update-form").serialize();

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("catalog/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#catalog-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('catalog-grid', {
                     
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
 
   $('#catalog-view-modal').modal('hide');
 var data="id="+id;

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("catalog/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#catalog-update-modal-container').html(data); 
                 $('#catalog-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
