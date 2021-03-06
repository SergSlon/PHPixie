<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-02-05 at 09:23:37.
 */
require_once(TESTDIR.'/system/mocks/misc.php');
include(ROOTDIR.'/system/classes/view.php');

class ViewTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var View
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		Misc::$file = (dirname(__FILE__).'/files/view.php');
		$this->object = View::get('view');
	}

	/**
	 * @covers View::__set and View::__get
	 */
	public function test__set()
	{
		// Remove the following lines when you implement this test.
		$this->object->fairy = 'Tinkerbell';
		$this->assertEquals($this->object->fairy, 'Tinkerbell');
	}

	/**
	 * @covers View::render
	 */
	public function testRender()
	{

		$this->object->fairy = 'Tinkerbell';
		$out = $this->object->render();
		$this->assertEquals($this->object->fairy, 'Tinkerbell');
	}

}
