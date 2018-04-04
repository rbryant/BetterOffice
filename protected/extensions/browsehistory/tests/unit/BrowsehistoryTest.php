<?php

/**
 * Test of Browsehistory
 *
 * @package	extensions.browsehistory
 * @subpackage	test
 * @author	Olivier Maury <Olivier.Maury@grignon.inra.fr>
 * @copyright	INRA 2012
 * @license	GPL {@link http://www.gnu.org/copyleft/gpl.html}
 * @since	2012-01-30
 * @version	2012-01-30
 */
include_once Yii::getPathOfAlias('ext.browsehistory.models.Browsehistory') . '.php';

/**
 * Test of Browsehistory
 *
 * @uses	CTestCase
 * @package	extensions.browsehistory
 * @subpackage	test
 * @author	Olivier Maury <Olivier.Maury@grignon.inra.fr>
 * @copyright	INRA 2012
 * @license	GPL {@link http://www.gnu.org/copyleft/gpl.html}
 * @since	2012-01-30
 * @version	2012-01-30
 */
class BrowsehistoryTest extends CTestCase {

	public function setUp() {
		parent::setUp();
		Browsehistory::clear('test');
	}

	/**
	 * Test the constructor.
	 */
	public function testConstruct() {
		$history = Browsehistory::getInstance('test', 10);
		$expected = 0;
		$actual = count($history);
		$this->assertEquals($expected, $actual, 'A new history must contain 0 values not ' . $actual);
	}

	/**
	 * Test if an exception is raised when instancing twice, with different maxSize.
	 */
	public function testConstructException() {
		$history = Browsehistory::getInstance('test', 10);
		$history = Browsehistory::getInstance('test', 10);
		$exception = false;
		try {
			$history = Browsehistory::getInstance('test', 3);
		} catch (CException $e) {
			unset($e);
			$exception = true;
		}
		$this->assertTrue($exception, 'A CException must be raised!');
	}

	/**
	 * Test adding 1 value, and test last().
	 */
	public function testPushOneValue() {
		$history = Browsehistory::getInstance('test', 10);

		$route = 'site/index';
		$title = 'Homepage';
		$history->push($route, $title);
		$expected = 1;
		$actual = count($history);
		$this->assertEquals($expected, $actual, 'The history must contain 1 value not ' . $actual);

		$expected = array('url' => $route, 'label' => $title);
		$actual = $history->last();
		$this->assertEquals($expected, $actual, "Browsehistory::last() must return array($route, $title).");

		$actual = null;
		foreach ($history as $n => $entry) {
			$actual = $entry;
		}
		$expected = array('url' => $route, 'label' => $title);
		$this->assertEquals($expected, $actual, 'The history must contain the last added page.');
	}

	/**
	 * Test adding more values than the max.
	 */
	public function testPushMoreThanMax() {
		$history = Browsehistory::getInstance('test', 3);

		for ($i = 1; $i < 3; $i++) {
			$history->push('route/' . $i, 'title #' . $i);
			$expected = $i;
			$actual = count($history);
			$this->assertEquals($expected, $actual, 'The history must contain ' . $expected . ' value(s) not ' . $actual);
		}

		$history->push('route/4', 'title #4');
		$expected = 3;
		$actual = count($history);
		$this->assertEquals($expected, $actual, 'The history must contain ' . $expected . ' value(s) not ' . $actual);
	}

	/**
	 * Test adding many times the same page but, keeping only one.
	 */
	public function testPushMany() {
		$history = Browsehistory::getInstance('test', 3);

		for ($i = 1; $i < 3; $i++) {
			$history->push('route/', 'title');
			$expected = 1;
			$actual = count($history);
			$this->assertEquals($expected, $actual, 'The history must contain only 1 value not ' . $actual);
		}
	}

}
