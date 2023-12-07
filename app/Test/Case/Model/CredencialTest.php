<?php
App::uses('Credencial', 'Model');

/**
 * Credencial Test Case
 */
class CredencialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.credencial',
		'app.estado',
		'app.auditor_auditoria',
		'app.auditor',
		'app.area_control',
		'app.ente_de_control',
		'app.titulo',
		'app.nivel',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.conclusion',
		'app.recomendacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Credencial = ClassRegistry::init('Credencial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Credencial);

		parent::tearDown();
	}

}
