<?php
$this->breadcrumbs=array(
	'Proposal Lines',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('proposal-line-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Proposal Lines</h1>
<hr />

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>'javascript:return;','linkOptions'=>array('onclick'=>'renderCreateForm()')),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposal-line-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
			array(
				'header' => '',
        		'value' => function($data)
		        {
		            $this->widget('bootstrap.widgets.TbButton',array(
						'label' => 'View',
						'type' => 'primary',
						'size' => 'mini',
		            	'url'=>Yii::app()->createUrl("/proposal-line/view/", array("id"=>$data["id"])),
		            	'htmlOptions'=>array('style'=>'margin:0px;'),
					));
		        },
		    	'htmlOptions'=>array('width'=>'62px;'),
		    ),
		'catnum',
		'description',
		'quantity',
		'price',
		'time',
		/*
		'linecost',
		'taxable',
		'proposal',
		*/

			array(
				'header' => '',
        		'value' => function($data)
		        {
					$this->widget('bootstrap.widgets.TbButtonGroup', array(
						'size'=>'mini',
					    'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					    'buttons'=>array(
					       array('label'=>'Actions', 'items'=>array(
						       array('label'=>'Update', 'url'=>Yii::app()->createUrl("/proposal-line/update/", array("id"=>$data["id"]))),
						       array('label'=>'Delete', 'url'=>Yii::app()->createUrl("/proposal-line/view/", array("id"=>$data["id"]))),
					    	)),
					    ),
					));
		        },
		    	'htmlOptions'=>array('width'=>'100px;'),
		    ),
       
	),
)); 


 $this->renderPartial("_ajax_update");
 $this->renderPartial("_ajax_create_form",array("model"=>$model));
 $this->renderPartial("_ajax_view");

 ?>

 
<script type="text/javascript"> 
function delete_record(id)
{
 
  if(!confirm("Are you sure you want delete this?"))
   return;
   
 //  $('#ajaxtest-view-modal').modal('hide');
 
 var data="id="+id;
 

  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("proposal-line/delete"); ?>',
   data:data,
success:function(data){
                 if(data=="true")
                  {
                     $('#proposal-line-view-modal').modal('hide');
                     $.fn.yiiGridView.update('proposal-line-grid', {
                     
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
 

