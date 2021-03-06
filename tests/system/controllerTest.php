<?php

require_once(ROOTDIR.'/system/classes/response.php');
require_once(ROOTDIR.'/system/classes/controller.php');
require_once(TESTDIR.'/system/mocks/testController.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-02-05 at 16:39:57.
 */
class ControllerTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var Controller
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new Test_Controller;
	}

	public function testRun()
	{
		$this->object->run('index');
		$this->assertEquals($this->object->counter, 3);
	}

	public function testException()
	{
		$except = false;
		try {
			$this->object->run('bogus');
		} catch (Exception $e) {
			$except = true;
		}
		$this->assertEquals($except, true);
	}

}
