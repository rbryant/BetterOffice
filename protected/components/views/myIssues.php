<?php 

$maxPortletRecords = $this->maxPortletRecords;
$userid = Yii::app()->user->id;

$data = new CActiveDataProvider('Issue', array(
    'criteria'=>array(
        'condition'=>'status=2 and assignedto = "'.$userid.'"',
		'limit'=>$maxPortletRecords,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));

$gridColumns=array('id','title');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id' => 'task-grid',
	'type' => 'striped bordered',
	'dataProvider' =>$data ,
	'template' => "{items}",
	'bulkActions' => array(
		'actionButtons' => array(
			array(
				'id' => 'btnUpdate',
				'buttonType' => 'button',
				'type' => 'primary',
				'size' => 'small',
				'label' => 'Complete Issues',
				'url' => array('batchUpdate'),
				'htmlOptions' => array('class'=>'bulk-action'),
				'click' => 'js:batchActions'),
			),
		),
		// if grid doesn't have a checkbox column type, it will attach
		// one and this configuration will be part of it
		'checkBoxColumnConfig' => array(
				'name' => 'id'
		),
	'columns'=>array(
		//'id',
		'title',
        //array('htmlOptions' => array('nowrap'=>'nowrap'),
		//'class'=>'bootstrap.widgets.TbButtonColumn',
		//'viewButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
		//'updateButtonUrl'=>'Yii::app()->createUrl("/task/update/", array("id"=>$data["id"]))',
		//'deleteButtonUrl'=>'Yii::app()->createUrl("/task/view/", array("id"=>$data["id"]))',
        //    ),
		)
));

?>
<script type="text/javascript">
    // as a global variable
    var gridId = "task-grid";

    $(function(){
        // prevent the click event
        $(document).on('click','#btnUpdate',function() {
			//alert('test');
            return false;
        });
    });
    function batchActions(values){
        //var url = $(this).attr('href');
        var url = '/test/index.php/task/BatchUpdate/';
        var ids = new Array();
		//alert(url);
        if(values.size()>0){
            values.each(function(idx){
                ids.push($(this).val());
            });
            $.ajax({
                type: "POST",
                url: url,
                data: {"ids":ids},
                dataType:'json',
                success: function(resp){
                    alert( "Data Saved: " + resp);
                    if(resp.status == "success"){
                       $.fn.yiiGridView.update(gridId);
                    }else{
                        alert(resp.msg);
                    }
                }
            });
        }
    }
</script>