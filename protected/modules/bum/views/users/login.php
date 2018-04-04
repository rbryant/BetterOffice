<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

              <div class="container">
                    <div class="form" style="margin-top:100px;">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'htmlOptions'=>array('class'=>'form-signin'),
                            'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                            ),
                    )); ?>
                    <div class="title-box">
                        <h1 class="oro-title" title="OroCRM">Better-Office</h1>
                        <span class="divider-vertical"></span>
                        <h2 class="title">Login</h2>
                    </div>
                   
                    <fieldset>
                        <div class="input-prepend">
                            <span class="add-on">Username</span>
                            <?php echo $form->textField($model,'username'); ?>
                        </div>
                        <div class="input-prepend">
                            <span class="add-on">Password</span>
                            <?php echo $form->passwordField($model,'password'); ?>
                            <!--input type="password" id="prependedInput2" class="span2 pb_payload" name="_password" required="required" placeholder="Password" autocomplete="off" pb-role="password" keyev="true" clickev="true" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); padding-right: 0px; background-attachment: scroll; cursor: auto; background-position: 100% 50%; background-repeat: no-repeat no-repeat;"-->
                        </div>
                        <label class="checkbox oro-remember-me">
                            <?php echo $form->checkBox($model,'rememberMe'); ?> Remember me on this computer
                        </label>
                        <div class="control-group form-row">
                            <a href="/user/reset-request">Forgot your password?</a>
                            <!--?php echo CHtml::submitButton('Login'); ?-->
                            <button type="submit" class="btn btn-large  btn-primary pull-right" id="_submit" name="_submit" pb-role="submit">Log in</button>
                        </div>
                    </fieldset>    

              </div>

        <?php $this->endWidget(); ?>
        </div><!-- form --><?php
        if ($this->module->install) {
            ?><DIV class="message note">Or go to the install page; click <?php echo CHtml::link('here',array('install/index')); ?>.</DIV><?php
        }
