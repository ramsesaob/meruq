<?php
App::uses('AreaControl', 'Model');

/**
 * AreaControl Test Case
 */
class AreaControlTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.area_control',
		'app.ente_de_control',
		'app.auditor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AreaControl = ClassRegistry::init('AreaControl');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AreaControl);

		parent::tearDown();
	}

}
