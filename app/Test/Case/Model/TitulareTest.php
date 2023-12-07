<?php
App::uses('Titulare', 'Model');

/**
 * Titulare Test Case
 */
class TitulareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.titulare',
		'app.titulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Titulare = ClassRegistry::init('Titulare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Titulare);

		parent::tearDown();
	}

}
