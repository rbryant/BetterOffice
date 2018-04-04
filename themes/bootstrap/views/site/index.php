<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->isGuest)
{
	echo
		'<div class="jumbotron masthead">
			<div class="container-fluid">
				<h1>Better-Office</h1>
				<p>Make it gorgeous. Do it fast.</p>
				<p><a href="#" class="btn btn-primary btn-large">Start Today!</a></p>
				<ul class="masthead-links">
					<li>from Better-Webs.com</li>
					<li>Version 1.0.1</li>
				</ul>
			</div>
		</div>
		
		<div class="bs-docs-social">
			<div class="container">
				<ul class="bs-docs-social-buttons">
					<li class="follow-btn">
						<a href="https://twitter.com/radcg.net" class="twitter-follow-button" data-link-color="#0069D6"
						   data-show-count="true">Follow @radcg.net</a>
					</li>
					<li class="tweet-btn">
						<a href="https://www.facebook.com/better-webs" class="twitter-share-button">Like Us!</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="container-fluid">
		
			<div class="marketing">
		
				<h1>Introducing Better-Office</h1>
		
				<p class="marketing-byline">By Business Professionals, for Business Professionals: Better-Office is better way to do business.</p>
		
				<div class="row-fluid">
					<div class="span4">
						<h2>Built from Experience</h2>
		
						<p> </p>
					</div>
					<div class="span4">
						<h2>Built for Business</h2>
		
						<p></p>
					</div>
					<div class="span4">
						<h2>Expect Results</h2>
		
						<p></p>
					</div>
				</div>
			</div>
		</div>';
}
else
{
	$this->redirect(Yii::app()->request->baseUrl.'/dashboard');
	
}
