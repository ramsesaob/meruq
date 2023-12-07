<?php
App::uses('Auditor', 'Model');

/**
 * Auditor Test Case
 */
class AuditorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auditor',
		'app.area_control',
		'app.ente_de_control',
		'app.titulo',
		'app.estado',
		'app.nivel',
		'app.auditor_auditoria',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.conclusion',
		'app.recomendacion',
		'app.credencial'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Auditor = ClassRegistry::init('Auditor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Auditor);

		parent::tearDown();
	}

}
