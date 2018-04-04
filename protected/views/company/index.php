<?php
$this->breadcrumbs=array(
	'Companies',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('grid-company-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<div class="container-fluid page-title">
        <div class="navigation clearfix navbar-extra">
            <div class="row">
                <div class="span9">
                    <div class="pull-left">
                        <div class="container-fluid">
                            <h1 class="oro-subtitle">Companies</h1>
                        </div>
                    </div>
                <div></div></div>
                <div class="pull-right title-buttons-container">
                    <?php 
                    $this->beginWidget('zii.widgets.CPortlet', array(
                            'htmlOptions'=>array(
                                    'class'=>''
                            )
                    ));
                    $this->widget('bootstrap.widgets.TbMenu', array(
                            'type'=>'pills',
                            'items'=>array(
                                    array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>'javascript:return;','linkOptions'=>array('onclick'=>'renderCreateForm()'), 'visible'=>Yii::app()->user->checkAccess('CompanyAdd_Access')),
                                    array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                                    array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
                                    array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true, 'visible'=>Yii::app()->user->checkAccess('CompanyToPDF__Access')),
                                    array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true, 'visible'=>Yii::app()->user->checkAccess('CompanyToExcel__Access')),
                            ),
                    ));
                    $this->endWidget();
                    ?>                    
                    
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="grid-container">
        <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search',array(
                'model'=>$model,
        )); ?>
        </div><!-- search-form -->
      
        
        
        <?php 
        //zii.widgets.grid.CGridView'
        $this->widget('yiiwheels.widgets.grid.WhGridView',array(
                'id'=>'grid-company-grid',
                'filter'=>$model,
                'fixedHeader' => false,
                'headerOffset' => 40,
                'dataProvider'=>$model->search(),
                'type'=>'striped bordered condensed',
                'template'=>'{summary}{pager}{items}{pager}',
                'htmlOptions'=>array('style'=>'cursor: pointer;'),
                'selectableRows' => 1,
                //'selectionChanged'=>'updateABlock',
                'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
                'columns'=>array(
                        'name',
                        'description',
                        'address',
                        array('name'=>'rUsers.user_name', 'value'=>$model->rUsers->user_name),
                        //'manager',
                        'create_date',
                        array(
                            'type'=>'raw',
                            'header'=>'Actions',
                            'value'=>'"                             
                                     <ul class=\'nav nav-pills icons-holder launchers-list\'>
                                        <!--li class=\'launcher-item\'><a href=\'javascript:return;\' onclick=\'renderView(".$data->id.")\' class=\'action no-hash\' title=\'View\'><i class=\'icon-user hide-text\'>View</i></a></li-->
                                        <li class=\'launcher-item\'><a href=\'javascript:return;\' onclick=\'renderUpdateForm(".$data->id.")\' class=\'action no-hash\' title=\'Update\'><i class=\'icon-edit hide-text\'>Update</i></a></li>
                                        <li class=\'launcher-item\'><a href=\'javascript:return;\' onclick=\'delete_record(".$data->id.")\' class=\'action\' title=\'Delete\'><i class=\'icon-trash hide-text\'>Delete</i></a></li>
                                     </ul>
                             "'),

                ),
        )); 

         $this->renderPartial("_ajax_update");
         $this->renderPartial("_ajax_create_form",array("model"=>$model));
        // $this->renderPartial("_ajax_view");

         ?>                                 
        
<div id='tab'></div>
    </div></div>

<script type="text/javascript"> 
function delete_record(id)
{
 
  if(!confirm("Are you sure you want delete this?"))
   return;
   
 //  $('#ajaxtest-view-modal').modal('hide');
 
 var data="id="+id;
 

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("company/delete"); ?>',
   data:data,
success:function(data){
                 if(data=="true")
                  {
                     $('#company-view-modal').modal('hide');
                     $.fn.yiiGridView.update('grid-company-grid', {
                     
                         });
                 
                  } 
                 else
                   alert("deletion failed");
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
       //  alert(data);
    },

  dataType:'html'
  });

}
</script>

<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{
    window.print();
}
</script>
<script type="text/javascript">
    function updateABlock(grid_id) {
        var keyId = $.fn.yiiGridView.getSelection(grid_id);
        keyId  = keyId[0]; //above function returns an array with single item, so get the value of the first item
        AjaxView(keyId);
    }
</script> 

