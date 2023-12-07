<?php
App::uses('Denuncia', 'Model');

/**
 * Denuncia Test Case
 */
class DenunciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.denuncia',
		'app.denuncia_denunciado',
		'app.denunciante',
		'app.denuncia_empleado',
		'app.ente_empleado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Denuncia = ClassRegistry::init('Denuncia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Denuncia);

		parent::tearDown();
	}

}
