<?php 

$maxPortletRecords = $this->maxPortletRecords;
$userid = Yii::app()->user->id;

foreach ($this->getMyMeetings() as $column) : 
	echo '	<div class="row-fluid">
				<div class="social-item">
				<div class="comment model-details-summary clearfix">
					<div class="user-details calendar-day">'. date('j', strtotime($column['startdatetime'])).'<div>'
					. date('M', strtotime($column['startdatetime'])).'</div>
					</div>
					<div class="calendar-content">
						<p>'. date('h:m', strtotime($column['startdatetime'])).'&nbsp;-&nbsp;
							<a class="user-link" href="' .Yii::app()->basePath. '/bum/users/viewProfile/'. $column['attendee'] .'">'. 
								$column->rAttendee->user_name .'</a>
						</p>
						'. $column['description'] .'<br/>
						<div class="location">Location:'. $column['location'] .'</div>
					</div>
				</div>
			</div>
			</div>
			
<style>
.calendar-day {
width: 50px;
height: 42px;
background: #fcfcfc;
background: linear-gradient(top, #fcfcfc 0%,#dad8d8 100%);
background: -moz-linear-gradient(top, #fcfcfc 0%, #dad8d8 100%);
background: -webkit-linear-gradient(top, #fcfcfc 0%,#dad8d8 100%);
border: 1px solid #d2d2d2;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
font-family: Helvetica, sans-serif;
font-size: 30px;
text-align: center;
color: #9e9e9e;
vertical-align: bottom;
position: relative;
padding-top: 10px;
}
.calendar-day p {
	font-family: Helvetica, sans-serif; 
	font-size: 100px; text-align: center; color: #9e9e9e; 
}
.calendar-day div {
background: #d10000;
background: linear-gradient(top, #d10000 0%, #7a0909 100%);
background: -moz-linear-gradient(top, #d10000 0%, #7a0909 100%);
background: -webkit-linear-gradient(top, #d10000 0%, #7a0909 100%);
font-size: 14px;
font-weight: bold;
color: #fff;
text-transform: uppercase;
display: block;
border-top: 0px solid #a13838;
border-radius: 0 0 5px 5px;
-moz-border-radius: 0 0 5px 5px;
-webkit-border-radius: 0 0 5px 5px;
padding: 3px 0 3px 0;
position: absolute;
bottom: 0px;
width: 50px;
}
.calendar-content{
	margin-left:65px;
	line-height:140%;
}
.calendar-content p{
	margin: 0px;
	font-weight: bold;
	font-size: 12px;
}
.location{
border-top: 1px #e5e5e5 solid;
width: 100%;
margin-top: 3px;
}
</style>
			
			';
endforeach;