<?php
foreach ($this->getRecentComments() as $column) : 
		echo '	<div class="row-fluid">
				<div class="social-item">
				<div class="comment model-details-summary clearfix">
					<span class="user-details">
						<a href="' .Yii::app()->basePath. '/bum/users/viewProfile/'. $column->userId .'">';
		$this->widget('application.extensions.VGGravatarWidget.VGGravatarWidget', 
         array(
              'email' => $column->rUser->email, // email to display the gravatar belonging to it
              'hashed' => false, // if the email provided above is already md5 hashed then set this property to true, defaults to false
              'size' => 50, // the gravatar icon size in px defaults to 40
              'rating' => 'PG', // the Gravatar ratings, Can be G, PG, R, X, Defaults to G
              'htmlOptions' => array( 'alt' => 'Gravatar Icon', 'class'=>'gravatar' ), // Html options that will be appended to the image tag
         ));							
			
         echo '</a>
					</span>
					<div class="comment-content">
						<p>
							<a class="user-link" href="' .Yii::app()->basePath. '/bum/users/viewProfile/'. $column->rUser->id .'">'. $column->rUser->user_name .'</a>
							- from '. $column['module'] .' module.
						</p>
						'. $column['content'] .'
					</div>
					<span></span>
					<span class="comment-details">
						<strong>'. $column['create_time'] .'</strong>
						<!--span class="delete-comment">
							<a id="deleteSocialItemLink17" class="deleteSocialItemLink17" href="#">Delete</a>
						</span-->
					</span>
				</div>
				<div id="CreateCommentForSocialItem-17">
					<span><a class="show-create-comment" href="#">Comment</a></span>
				</div>
			</div>
			</div>
			';
endforeach;

?>
<div class="row-fluid"><div class="span12"><a href="comment" class="btn btn-primary btn-mini">More Comments</a></div></div>