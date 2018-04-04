<?php
/*## TbLabel class file.
 *
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright  Copyright &copy; Christoffer Niska 2011-
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 * @package bootstrap.widgets
 */

/**
 * Bootstrap label widget.
 * @see <http://twitter.github.com/bootstrap/components.html#labels>
 */
class getGravatar extends VGGravatarWidget
	{
		public $email = '';
		
		public function renderAvatar($id){
			parent::init();
			
			$model=Users::model()->findByPk($id);
			$email = $model->email;
			
			$gravatar = $this->widget('ext.VGGravatarWidget.VGGravatarWidget', 
             array(
	              'email' => $email, // email to display the gravatar belonging to it
	              'hashed' => false, // if the email provided above is already md5 hashed then set this property to true, defaults to false
	              'default' => 'identicon', // if an email is not associated with a gravatar this image will be displayed,
	                           // by default this is omitted so the Blue Gravatar icon will be displayed you can also set this to
	                           // "identicon" "monsterid" and "wavatar" which are default gravatar icons
	              'size' => 50, // the gravatar icon size in px defaults to 40
	              'rating' => 'PG', // the Gravatar ratings, Can be G, PG, R, X, Defaults to G
	              'htmlOptions' => array( 'alt' => 'Gravatar Icon' ), // Html options that will be appended to the image tag
	         ));
	         
	         return gravatar;
			
		}
	}
	         
?>	         
