<?php
App::uses('DenunciaEmpleado', 'Model');

/**
 * DenunciaEmpleado Test Case
 */
class DenunciaEmpleadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.denuncia_empleado',
		'app.denuncia',
		'app.ente_empleado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DenunciaEmpleado = ClassRegistry::init('DenunciaEmpleado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DenunciaEmpleado);

		parent::tearDown();
	}

}
