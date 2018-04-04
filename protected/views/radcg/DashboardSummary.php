<?php
$userId = Yii::app()->user->getUserId();

$cMyLeads = 0; //Contact::model()->count("");
$cMyLeadsurl = Yii::app()->createUrl('/Contact/MyLeads');

$cMyAccounts = Company::model()->count("manager = ".$userId);
$cMyAccountsurl = Yii::app()->createUrl('/Company/MyAccounts');

$cMyOpportunities = Opportunity::model()->count("owner = ".$userId." and status = 2");
$cMyOpportunitiesurl = Yii::app()->createUrl('/Opportunity/MyOpportunities');

$cMyProjects = Project::model()->count("user = ".$userId." and status < 4");
$cMyProjectsurl = Yii::app()->createUrl('/Project/MyProjects');

?>
<button class="btn btn-mini dash" title="My Leads"><a href="<?php echo $cMyLeadsurl; ?>"><span class="fa fa-star"></span><?php echo $cMyLeads; ?></a></button>
<button class="btn btn-mini dash" title="My Accounts"><a href="<?php echo $cMyAccountsurl; ?>"><span class="fa fa-globe"></span><?php echo $cMyAccounts; ?></a></button>
<button class="btn btn-mini dash" title="My Opportunities"><a href="<?php echo $cMyOpportunitiesurl; ?>"><span class="fa fa-signal"></span><?php echo $cMyOpportunities; ?></a></button>
<button class="btn btn-mini dash" title="My Projects"><a href="<?php echo $cMyProjectsurl; ?>"><span class="fa fa-briefcase"></span><?php echo $cMyProjects; ?></a></button>