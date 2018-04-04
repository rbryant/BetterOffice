<?php echo CHtml::link('Create Proposal Line', "",  // the link for open the dialog
    array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{addProposalLine(); $('#dialogProposalLine').dialog('open');}"));
   
?>

<?php 
$proposallineDataProvider=new CActiveDataProvider('ProposalLine', array(
    'criteria'=>array(
        'condition'=>'proposal='.$id,
        //'with'=>array('author'),
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));
$proposallineDataProvider->getData();

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposalline-grid',
	'dataProvider'=>$proposallineDataProvider,
	'type'=>'striped bordered condensed',
	'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array(
		       'class'=>'EJuiDlgsColumn',
		 
		       //configure like CButtonColumns:
		       //but some properties (buttons.view.url,buttons.view.id, buttons.view.ajax, buttons.update.click  ...) will be set by the component
		 
		       //'template'=>'{view}',
		       'viewButtonImageUrl'=>Yii::app()->baseUrl .'images/dialogview.png',
		       'buttons'=>array(
		            'view' => array(
		                'label'=> 'View',
		            ),
		            'update' => array(
                        'label'=> 'Edit',
                       ),
		            'delete' => array(
                        'label'=> 'Delete',
                       ),
		            ),
		 
		  		//---------- additional config for the dialogs starts here -------------
		 
		        //if you want to use a custom dialog config: default is  'ext.quickdlgs.juimodal'
		        //'viewDialogConfig' => 'ext.quickdlgs.mycustomjuiattributes'
		 
		        //don't override the CButtonColumn view button
		        //'viewDialogEnabled' => true,
		 
		        //the attributes for the EAjaxJuiDlg widget: use like the 'attributes' param from EQuickDlgs::ajaxButton above
		        'viewDialog'=>array(
		             'controllerRoute' => '//proposalLine/view',
		             'actionParams' => array('id' => '$data->id'),
		             'dialogTitle' => 'View detail',
		             'hideTitleBar' => true, 
		             //'dialogWidth' => 800, //use the value from the dialog config
		             //'dialogHeight' => 600,
		        ),
		 
		        //the attributes for the EFrameJuiDlg widget. use like the 'attributes' param from EQuickDlgs::iframeButton
		        'updateDialog'=>array(
		               'controllerRoute' => '//proposalLine/update', 
		               'actionParams' => array('id' => '$data->id'),
		               'dialogTitle' => 'View Line #$data->id',
		               'dialogWidth' => 800, 
		               'dialogHeight' => 800,
	            ),
	      ),																							
		'catnum',
		'description',
		'quantity',
		'price',
		'time',
		'linecost',
		'taxable',
	),
)); 
?>
