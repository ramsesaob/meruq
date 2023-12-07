<?php
App::uses('EnteControlTitulare', 'Model');

/**
 * EnteControlTitulare Test Case
 */
class EnteControlTitulareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ente_control_titulare',
		'app.titulare',
		'app.ente_de_control'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EnteControlTitulare = ClassRegistry::init('EnteControlTitulare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EnteControlTitulare);

		parent::tearDown();
	}

}
