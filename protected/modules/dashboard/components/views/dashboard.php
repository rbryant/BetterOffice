<style>
.view-toolbar, .portlet-view-toolbar {
	float: left;
}
.managePortletLink{
	color: #282a76;
	font-weight:bold;
	text-shadow: #fff 0 1px 0;
	padding: 0 10px 0 15px;
	line-height: 30px;
	display: inline-block;
	border-left: 1px solid #bababa;
}
</style>

<div class="container-fluid page-title">
        <div class="navigation clearfix navbar-extra">
            <div class="row">
                <div class="span9">
                    <div class="pull-left">
                        <div class="container-fluid">
                            <div class="portlet-view-toolbar">
                                <button id="portlets-toggler" class="managePortletLink btn ">
                                    Manage Portlets</button>
                            
                                <?php
                                $param = CJavaScript::encode(array('baseUrl' => Yii::app()->createUrl('dashboard/default').'/'));
                                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                                    'id' => 'portlets-toggler-popup',
                                    'options' => array(
                                        'title' => 'Manage Portlets',
                                                'htmlOptions'=>array('class'=>''),
                                        'modal' => true,
                                        'autoOpen' => false,
                                        'hide' => 'fade',
                                        'show' => 'fade',
                                        'buttons' => array(
                                          array(
                                            'text' => 'OK',
                                            'click' => "js:function() { Dashboard.fn.togglePortlets($param) }"
                                          ),
                                          array(
                                            'text' => 'Cancel',
                                            'click' => 'js:function() { $(this).dialog("close"); }',
                                          ),
                                        )
                                     )));
                                ?>
                                    <ul>
                                    <?php foreach ($portlets as $column) : ?>
                                      <?php foreach ($column as $portlet) : ?>
                                      <li>
                                        <input class="portlets-toggle-item" type="checkbox" id="<?php print $portlet['class'] ?>-toggler" value="<?php print $portlet['class'] ?>"<?php print $portlet['visible'] ? ' checked="checked"' : '' ?> />
                                        <?php print $portlet['class'] ?>
                                      </li>
                                      <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    </ul>
                                <?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
                                </div>
                        </div>
                    </div>
                <div></div></div>
                <div class="pull-right title-buttons-container">
                    
                </div>
            </div>
        </div>
    
    <div class="grid-container">

        <div class="row-fluid" id="dashboard">

        <div class="span4" id="column-0">
        <?php if (isset($portlets[0])) : ?>
          <?php foreach ($portlets[0] as $portlet) : ?>
          <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>



        <div class="span4" id="column-1">
        <?php if (isset($portlets[1])) : ?>
          <?php foreach ($portlets[1] as $portlet) : ?>
          <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>



        <div class="span4" id="column-2">
        <?php if (isset($portlets[2])) : ?>
          <?php foreach ($portlets[2] as $portlet) : ?>
          <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>

        </div>
        
    </div>
</div>
