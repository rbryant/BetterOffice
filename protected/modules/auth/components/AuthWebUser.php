<?php
/**
 * AuthWebUser class file.
 * @author Ricardo Obregón <ricardo@obregon.co>
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Ricardo Obregón 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package auth.components
 */

/**
 * Web user that allows for passing access checks when enlisted as an administrator.
 *
 * @property boolean $isAdmin whether the user is an administrator.
 */
class AuthWebUser extends CWebUser
{
    /**
     * @var string[] a list of names for the users that should be treated as administrators.
     */
    public $admins = array('admin');
   // Store the model in order not to repeat the query.
    protected $_model;

    /**
     * Initializes the component.
     */
    public function init()
    {
        parent::init();
        $this->setIsAdmin(in_array($this->name, $this->admins));
    }

    public function getStatus(){
      $user = $this->loadUser(Yii::app()->user->id);
      return $user->status;
    }
    
    public function getFullName(){
      $user = User::model()->findByPk(Yii::app()->user->id);
      return $user->name . ' ' . $user->surname;
    }
    
    public function getUserId(){
      $userId = Yii::app()->user->id;
      return $userId;
    }
    
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Users::model()->findByPk($id);
        }
        return $this->_model;
    }
     
    /**
     * Returns whether the logged in user is an administrator.
     * @return boolean the result.
     */
    public function getIsAdmin()
    {
        return $this->getState('__isAdmin', false);
    }

    /**
     * Sets the logged in user as an administrator.
     * @param boolean $value whether the user is an administrator.
     */
    public function setIsAdmin($value)
    {
        $this->setState('__isAdmin', $value);
    }

    /**
     * Performs access check for this user.
     * @param string $operation the name of the operation that need access check.
     * @param array $params name-value pairs that would be passed to business rules associated
     * with the tasks and roles assigned to the user.
     * @param boolean $allowCaching whether to allow caching the result of access check.
     * @return boolean whether the operations can be performed by this user.
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true)
    {
        if ($this->getIsAdmin()) {
            return true;
        }

        return parent::checkAccess($operation, $params, $allowCaching);
    }
}
