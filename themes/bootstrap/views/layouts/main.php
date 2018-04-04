<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
    xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="en">
        <!--<![endif]-->
        <head>
            <meta charset="utf-8" />
            <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <!-- Mobile viewport optimized: h5bp.com/viewport -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title><?php echo ucfirst($this->pageTitle); ?></title>
            <meta name="robots" content="index, nofollow"/>
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <meta name="author" content="Better-Webs.com" />

            <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico"/>
            <!--?php Yii::app()->bootstrap->register(); ?-->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fontawesome/css/font-awesome.min.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        </head>
<?php
          Yii::import('ext.browsehistory.models.Browsehistory');
          $maxNbOfRoutes = 10;
          $history = Browsehistory::getInstance();
          $history->push(null, ucfirst($this->pageTitle));
?>
<body class="">
<div id="progressbar" style="display:none">
  <h3>Loading ...</h3>
  <div class="progress progress-striped active">
    <div class="bar" style="width: 90%;"></div>
  </div>
</div>
<div>
  <div id="top-page">
    <div class="navbar" id="oroplatform-header">
      <div class="clearfix">
        <div class="pin-bar clearfix">
          <div id="mysum" class="pin-menus dropdown dropdown-close-prevent">
              <a href="/dashboard" title="Better-Office"> <i class="fa fa-tachometer white"></i></a> 
              <?php $this->renderPartial('//radcg/DashboardSummary') ?>
          </div>
          <div class="list-bar">
            <ul>
              <?php $this->widget('RecentMenu'); ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <div class="container">
          <h1 class="logo"> <a href="/dashboard" title="Better-Office"> <i class="fa fa-home"></i> Better-Office </a> </h1>
          <div class="navbar-responsive-collapse">
            <div class="nav pull-left top-search shortcuts"> 
              
              <div class="dropdown header-dropdown-shortcut header-utility-dropdown"> 
                <?php $this->widget('ShortcutMenu'); ?>
              </div>
              <!--div class="dropdown header-dropdown-search header-utility-dropdown"> <a href="javascript:void(0);" class="dropdown-toggle oro-dropdown-toggle" title="Search"><i class="fa fa-search white"></i></a>
                <ul class="dropdown-menu">
                  <li class="nav-header nav-header-title">Search</li>
                  <li class="dark">
                    <form method="get" action="/search/" style="margin: 0" id="top-search-form" class="search-form">
                      <div id="search-div" class="input-append input-prepend pull-left header-search">
                        <div class="btn-group">
                                
                        </div>
                        <div class="header-search-frame">
                          <input type="hidden" name="from" id="search-bar-from" value=""/>
                          <input type="text" id="search-bar-search" class="span2 search" placeholder="" name="search" value="" autocomplete="off"/>
                          <button type="submit" class="btn btn-search btn-primary">Go</button>
                          <div class="custom-dropdown" id="search-dropdown"></div>
                          <div class="search-more"><a href="javascript:void(0);" class="search-view-more-link">View more...</a></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </div-->
            </div>
            <div class="divider-vertical small-divider"></div>
            <div id="main-menu">
                <?php $this->widget('MainMenu'); ?>
            </div>
                <?php $this->widget('UserMenu'); ?>
          </div>
        </div>
      </div>
    </div>
    <div id="main" >
      <div class="container-fluid breadcrumb-pin">
        <div id="breadcrumb">
          <?php
            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
          ?>
        </div>
        <div id="pin-button-div" >
          <div class="navigation clearfix">
            <!--div class="top-action-box">
                
              <button class="btn favorite-button" title="Add this page to favorites"> 
                  <i class="icon-star hide-text">favorites</i> </button>
              <button class="btn minimize-button" title="Minimize the window to the pinbar"> 
                  <i class="icon-pushpin hide-text">minimaze tab</i> </button>
            </div-->
          </div>
        </div>
        <div id="flash-messages">
          <div class="flash-messages-frame">
            <div class="flash-messages-holder">
            
            </div>
          </div>
        </div>
      </div>
      <div class="hash-loading-mask"></div>
      <div id="container" class="scrollable-container">
          <?php echo $content; ?>
<!-- Grid -->
      </div>
    </div>
  </div>
</div>
<!-- page -->
<script>
    $(document).ready(function() {
       $('div.list-bar li a').wrap("<div class='pin-holder' />");
       $('div.pin-holder a').wrap("<div/>");
    });

$('ul.dropdown-menu li.active').parent().parent().addClass("active");
$('button .dash').tooltip('animation=true');
</script>    

      <script type="text/javascript">

/*
                function trueWidthPinBar(){
                    $('div.list-bar li').each(function(){
                        var _tempWidth = "auto";
                        //$(this).find('div.pin-holder div').width(_tempWidth);
                    });
                    var _sizeStart = $(window).width() -30 - 55;
                    var _sizeEnd = $('div.list-bar').width();
                    if(_sizeStart < _sizeEnd){
                        var _qty = $('div.list-bar ul li').size();
                        var _sizePaddings = (23 + 15) * _qty;
                        var _mainPadding = $('#main').innerWidth() - $('#main').width();
                        if($(window).width() < 980){
                            var _size = 980 -30 - _mainPadding  - _sizePaddings;
                        }else{
                            var _size = $(window).width() -30 - _mainPadding  - _sizePaddings;
                        }
                        var _tempWidth = _size / _qty;
                        _tempWidth = _tempWidth < 40 ? 40 : _tempWidth;
                        $('div.list-bar ul li').each(function(){
                            $(this).find('div.pin-holder div').width(_tempWidth);
                            $(this).find('div.pin-holder div').addClass('pin-frame');
                        });
                    }
                }
                $(function() {
                    trueWidthPinBar();
                    $(window).resize(trueWidthPinBar);
                });
*/
        </script>
</body>
</html>
    