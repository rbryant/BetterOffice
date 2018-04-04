<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!--header id="page-header">
   <h2><?php echo $this->pageTitle; ?></h2>
</header-->
<div class="row-fluid">
    <div class="span12" style="padding:10px;">
        <div id="content" class="span10">
            <?php echo $content; ?>
        </div><!-- content -->
        <div id="usermenu" class="span2 last">
            <div id="sidebar" class="sidebar_wrapper">
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'menucontent'),
                ));
                $this->endWidget();
            ?>
            </div><!-- sidebar -->
        </div>
    </div>
</div>
<?php $this->endContent(); ?>