<?php
App::uses('EnteEmpleado', 'Model');

/**
 * EnteEmpleado Test Case
 */
class EnteEmpleadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ente_empleado',
		'app.empleado',
		'app.ente',
		'app.denuncia_empleado',
		'app.denuncia',
		'app.denuncia_denunciado',
		'app.denunciante'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EnteEmpleado = ClassRegistry::init('EnteEmpleado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EnteEmpleado);

		parent::tearDown();
	}

}
