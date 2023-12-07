<?php
App::uses('EnteTitulare', 'Model');

/**
 * EnteTitulare Test Case
 */
class EnteTitulareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ente_titulare',
		'app.titulare',
		'app.ente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EnteTitulare = ClassRegistry::init('EnteTitulare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EnteTitulare);

		parent::tearDown();
	}

}
