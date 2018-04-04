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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="robots" content="index, nofollow">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Better-Webs.com" />

<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">

<!--script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/modernizr-2.6.1.min.js"></script-->

</head>

<body data-accent="blue">
    <div class="wrapper">
        <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
        <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
        <div id="main" class="container-fluid content">
            <!-- Main nav ========================================= -->
            <?php if (Yii::app()->user->isGuest) { ?>
                <div class="row-fluid">
                    <div class="span12">
                        <?php
                        $this->widget('bootstrap.widgets.TbNavbar', array(
                            'type' => '', // null or 'inverse'
                            'brand' => CHtml::encode(Yii::app()->name),
                            'brandUrl' => '#',
                            'fixed' => false,
                            'fluid' => true,
                            'collapse' => true, // requires bootstrap-responsive.css
                            'items' => array(
                                array(
                                    'class' => 'bootstrap.widgets.TbMenu',
                                    'items' => array(
                                        array('label' => 'Home', 'url' => Yii::app()->homeUrl,
                                            'active' => Yii::app()->controller->id === 'site' && Yii::app()->controller->action->id === 'index'),
                                        array('label' => 'About', 'url' => array('site/pages/about')),
                                        array('label' => 'Contact Us', 'url' => array('site/contact')),
                                    ),
                                ),
                                '<form class="navbar-form pull-left"><input type="text" class="span6"><button type="submit" class="btn">Submit</button></form>',
                                array(
                                    'class' => 'bootstrap.widgets.TbMenu',
                                    'items' => array(
                                        array('label' => 'Login', 'url' => array('/bum/users/login'), 'visible' => Yii::app()->user->isGuest),
                                        //array('label'=>'Sign Up', 'url'=>array('/bum/users/signUp'), 'visible'=>Yii::app()->user->isGuest),
                                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                                    ),
                                    'htmlOptions' => array('class' => 'pull-right'),
                                    //'ulClass' => 'pull-right',
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            <?php } ?>
            <!--  Application Menus -->
            <div class="row-fluid">
                <div class="span12">
                    <?php $this->widget('UserMenu'); ?>
                </div>
            </div>
            <div class="row-fluid">
                <!-- Breadcrumbs -->
                <div class="span12">
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?>
                </div>
            </div>
            <div class="row-fluid">
                <section id="page" class="span12"> <?php echo $content; ?> </section>
            </div>
        </div>
        <div class="push"></div>
    </div>
    <div id="footer" class="container-fluid footer">
        <div class="row">
            <!-- footer -->
            <div id="footer-inner" class="span12">
                <span class="pull-left"> Copyright &copy; <?php echo date('Y'); ?>
                    by Better-webs.com.&nbsp;&nbsp;</span> <span class="middle">All
                    Rights Reserved.</span> <span class="pull-right"><?php echo Yii::powered(); ?>
                </span>
            </div>
        </div>
    </div>

    <!-- page -->
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown()
        });
    </script>
</body>
</html>