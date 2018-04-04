<?php
/**
 * Browsehistory memories a limited list of last visited pages (route + title).
 *
 * @package	extensions.browsehistory
 * @author	Olivier Maury <Olivier.Maury@grignon.inra.fr>
 * @copyright	INRA 2012
 * @license	GPL {@link http://www.gnu.org/copyleft/gpl.html}
 * @since	2012-01-26
 * @version	2012-01-26
 */

/**
 * Browsehistory stores at most $maxSize routes with their title.
 *
 * @uses	IteratorAggregate
 * @package	extensions.browsehistory
 * @author	Olivier Maury <Olivier.Maury@grignon.inra.fr>
 * @copyright	INRA 2012
 * @license	GPL {@link http://www.gnu.org/copyleft/gpl.html}
 * @since	2012-01-26
 * @version	2012-01-26
 */
class Browsehistory implements Countable, IteratorAggregate {

	/**
	 * Singleton instances.
	 *
	 * @var Browsehistory[]
	 */
	private static $instances = array();

	/**
	 * Reference to &$_SESSION[namespace]
	 *
	 * @var	array
	 */
	protected $session;

	/**
	 * Max number of stored routes
	 *
	 * @var	integer
	 */
	protected $maxSize;

	/**
	 * Constructs a session namespace
	 *
	 * @param	string	$namespace	key in the session
	 * @param	integer	$maxSize	Max number of stored routes
	 */
	private function __construct($namespace = 'Browsehistory', $maxSize = 5) {
		$this->maxSize = $maxSize;
		if (!isset($_SESSION[$namespace])) {
			$_SESSION[$namespace] = array();
		}
		$this->session = &$_SESSION[$namespace];
	}

	/**
	 * Empty the history.
	 *
	 * @param	string	$namespace	key in the session
	 */
	public static function clear($namespace = 'Browsehistory') {
		self::$instances[$namespace] = null;
	}

	/**
	 * Count elements of the list.
	 *
	 * @return	int	number of pages in the history
	 */
	public function count() {
		return count($this->session);
	}

	/**
	 * Constructs a session namespace
	 *
	 * @param	string	$namespace	key in the session
	 * @param	integer	$maxSize	Max number of stored routes
	 * @return	Browsehistory	Singleton instance for the namespace
	 */
	public static function getInstance($namespace = 'Browsehistory', $maxSize = 5) {
		if (empty(self::$instances[$namespace])) {
			self::$instances[$namespace] = new Browsehistory($namespace, $maxSize);
		}
		if (self::$instances[$namespace]->getMaxSize() !== $maxSize) {
			throw new CException('The previous instance was not set with the same maximum number of stored pages.');
		}
		return self::$instances[$namespace];
	}

	/**
	 * Retrieve an external iterator.
	 *
	 * @return	array	the list of pages in the history
	 */
	public function getIterator() {
		return new ArrayIterator($this->session);
	}

	/**
	 * Accessor to maxSize.
	 *
	 * @return integer	Max number of stored routes
	 */
	public function getMaxSize() {
		return $this->maxSize;
	}

	/**
	 * Add items into the list of menu items for CMenu.
	 *
	 * @param array the list of menu items
	 */
	public function addItems(&$items) {
		if ($this->count()) {
			$items[] = array(
				'label'=>Yii::t('main', 'Last pages'),
				'url'=>null,
				'items'=>$this->items()
			);
		}
	}

	/**
	 * Get the list of menu items for CMenu.
	 *
	 * @param array the list of menu items
	 */
	public function items() {
		return array_reverse($this->session);
	}

	/**
	 * Retrieve the last entry.
	 *
	 * @return	array	the last entry (route, title)
	 */
	public function last() {
		if ($this->count() > 0) {
			return $this->session[$this->count() - 1];
		}
		return null;
	}

	/**
	 * Pushes an element at the end of the list.
	 *
	 * @param	string	$route	the route
	 * @param	string	$title	title page
	 */
	public function push($route, $title, $icon) {
		if ($route === null) {
			$route = Yii::app()->request->getUrl();
		}
		$entry = array('url' => $route, 'label' => $title, 'icon'=> $icon);
		if ($entry == $this->last()) {
			return;
		}
		$this->session[] = $entry;
		if (count($this->session) > $this->maxSize) {
			array_shift($this->session);
		}
	}

}
