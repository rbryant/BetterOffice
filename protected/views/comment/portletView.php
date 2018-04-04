<div class="row-fluid SocialItemsListView">
	<div class="row-fluid">
		<div class="span12">
	
				<?php $this->renderPartial('application.views.comment.portlet_ajax_create_form', array(
				    'model'=>Comment::model()
				)); ?>				
				
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
				<?php $this->widget('RecentComments', array(
				        'maxPortletRecords'=>Yii::app()->params['maxPortletRecords'],
						'module'=>'comment', //lowercase
						'ref_id'=>'%',
				    )); 
				?>
		</div>
	</div>
</div>
