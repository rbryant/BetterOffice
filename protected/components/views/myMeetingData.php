<?php
header('Content-type: text/json');
echo '[';
$separator = "";

foreach ($this->getMyMeetings() as $column) : 
    echo $separator;
    echo '  { "date": "'. date("Y-m-d H:m:s", $column->startdatetime) .'", "type": "'. $column->category_id .'", "title": "'. $column->name .'", "description": "'. $column->description .'", "url": "'. $column->url .'" },';
    $separator = ",";
endforeach;
echo ']';

?>
<div class="row-fluid"><div class="span12"><a href="comment" class="btn btn-primary btn-mini">More Comments</a></div></div>