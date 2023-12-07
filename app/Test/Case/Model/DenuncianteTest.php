<?php
App::uses('Denunciante', 'Model');

/**
 * Denunciante Test Case
 */
class DenuncianteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.denunciante',
		'app.denuncia_denunciado',
		'app.denuncia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Denunciante = ClassRegistry::init('Denunciante');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Denunciante);

		parent::tearDown();
	}

}
