<?php
App::uses('EnteDeControl', 'Model');

/**
 * EnteDeControl Test Case
 */
class EnteDeControlTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ente_de_control',
		'app.estado',
		'app.municipio',
		'app.area_control',
		'app.auditor',
		'app.titulo',
		'app.nivel',
		'app.auditor_auditoria',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.conclusion',
		'app.recomendacion',
		'app.credencial',
		'app.ente_control_titulare',
		'app.titulare'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EnteDeControl = ClassRegistry::init('EnteDeControl');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EnteDeControl);

		parent::tearDown();
	}

}
