<?php 
    	$worklogData=Yii::app()->db->createCommand("
		select w.id, w.task, DATE_FORMAT(w.workdate,'%m-%d-%Y') as workdate, 
			w.hours, r.name as resource, r.userid as userid, u.email, u.user_name, w.log, t.name as taskname
			from worklog w 
				left join task t on w.task = t.id 
				left join resource r on w.resource = r.id 
				left join users u on r.userid = u.id 
		where t.project ='". $model->id ."' order by w.workdate desc LIMIT 5")->queryAll();
		
		$worklogDataProvider = new CArrayDataProvider($worklogData, array(
			'keyField'=>'id',
			'pagination'=>array(
				'pageSize'=>10,
				),
		));
		
echo '<h5>Work Log</h5>';		
foreach ($worklogDataProvider->getData() as $column) : 
		echo '	<div class="row-fluid">
				<div class="social-item">
				<div class="comment model-details-summary clearfix">
					<span class="user-details">
						<a href="' .Yii::app()->basePath. '/bum/users/viewProfile/'. $column['userid'] .'">';
		$this->widget('application.extensions.VGGravatarWidget.VGGravatarWidget', 
         array(
              'email' => $column['email'], // email to display the gravatar belonging to it
              'hashed' => false, // if the email provided above is already md5 hashed then set this property to true, defaults to false
              'size' => 50, // the gravatar icon size in px defaults to 40
              'rating' => 'G', // the Gravatar ratings, Can be G, PG, R, X, Defaults to G
              'htmlOptions' => array( 'alt' => 'Gravatar Icon', 'class'=>'gravatar' ), // Html options that will be appended to the image tag
         ));							
         echo '</a>
					</span>
					<div class="comment-content">
						<p>
							<a class="user-link" href="' .Yii::app()->basePath. '/bum/users/viewProfile/'. $column['userid'] .'">'. $column['resource'] .'</a>
						</p>
						<span>'. $column['taskname'] .'('. $column['hours'] .' hrs)</span>
					</div>
					
					<span class="comment-details">
						'. $column['log'] .'<br/>
						<strong>'. $column['workdate'] .'</strong>
					</span>
				</div>
			</div>
			</div>
			';
endforeach;

if ($worklogDataProvider->getItemCount()>4){
	echo '<br/>';
	$this->beginWidget('zii.widgets.CPortlet', array(
			'htmlOptions'=>array(
				'class'=>''
			)
		));
		$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'pills',
			'items'=>array(
				array('label'=>'More Worklog', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('//worklog/index'),'active'=>true, 'linkOptions'=>array()),
			),
		));
		$this->endWidget();
}
?>

		
