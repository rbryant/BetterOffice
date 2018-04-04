<?php
$this->beginContent('//layouts/empty');

foreach(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
} 

echo $content;

$this->endContent(); ?>

