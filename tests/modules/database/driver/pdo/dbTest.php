<?php

require_once(ROOTDIR.'/modules/database/classes/db.php');
require_once(ROOTDIR.'/modules/database/classes/driver/pdo/db.php');
require_once(ROOTDIR.'/modules/database/classes/database/query.php');
require_once(ROOTDIR.'/modules/database/classes/driver/pdo/query.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-02-07 at 12:41:50.
 */
class DB_PDO_DriverTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var DB_PDO_Driver
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$dbfile = TESTDIR.'/modules/database/files/test.sqlite';
		file_put_contents($dbfile, '');
		$db = new PDO('sqlite:'.$dbfile);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec("CREATE TABLE fairies(id INT PRIMARY_KEY,name VARCHAR(255))");

		Misc::$file = TESTDIR.'/modules/database/files/config.sqlite';
		file_put_contents(Misc::$file, "<?php return ".var_export(array(
				'default' => array(
					'connection' => 'sqlite:'.$dbfile,
					'driver' => 'pdo'
				)
				), true).';');
		Config::set('database.default.connection', 'sqlite:'.$dbfile);
		Config::set('database.default.driver', 'pdo');
		$this->object = new DB_PDO_Driver('default');
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{

	}

	/**
	 * @covers DB_PDO_Driver::build_query
	 * @todo   Implement testBuild_query().
	 */
	public function testBuild_query()
	{
		$this->object->build_query('select');
	}

	/**
	 * @covers DB_PDO_Driver::get_insert_id
	 * @todo   Implement testGet_insert_id().
	 */
	public function testGet_insert_id()
	{
		$this->object->execute("INSERT INTO fairies(name)values('Trixie')");
		$this->assertEquals(1, $this->object->get_insert_id());
	}

	/**
	 * @covers DB_PDO_Driver::list_columns
	 * @todo   Implement testList_columns().
	 */
	public function testList_columns()
	{
		$cols = $this->object->list_columns('fairies');
		$this->assertContains('id', $cols);
		$this->assertContains('name', $cols);
	}

	/**
	 * @covers DB_PDO_Driver::execute
	 * @todo   Implement testExecute().
	 */
	public function testExecute()
	{
		$this->object->execute("SELECT * FROM fairies where id = ?", array(1));
	}

	/**
	 * @covers DB_PDO_Driver::execute
	 * @todo   Implement testExecute().
	 */
	public function testExecuteException()
	{
		$except = false;
		try {
			$this->object->execute("SELECUT * FROM fairies where id = ?", array(1));
		} catch (Exception $e) {
			$except = true;
		}
		$this->assertEquals(true, $except);
	}

	/**
	 * @covers DB_PDO_Driver::named_query
	 * @todo   Implement testExecute().
	 */
	public function testNamed_query()
	{
		$this->object->named_query("SELECT * FROM fairies where id = :id", array(array('id' => 1)));
	}

	/**
	 * @covers DB_PDO_Driver::named_query
	 * @todo   Implement testExecute().
	 */
	public function testNamed_queryException()
	{
		$except = false;
		try {
			$this->object->named_query("SELsECT * FROM fairies where id = :id", array(array('id' => 1)));
		} catch (Exception $e) {
			$except = true;
		}
		$this->assertEquals(true, $except);
	}

	/**
	 * @covers DB_PDO_Driver::instance
	 * @todo   Implement testExecute().
	 */
	public function testInstance()
	{
		$this->assertEquals('DB_PDO_Driver', get_class(DB::instance('default')));
	}

}
