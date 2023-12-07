<?php
App::uses('Poa', 'Model');

/**
 * Poa Test Case
 */
class PoaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.poa',
		'app.status',
		'app.estado',
		'app.auditor',
		'app.area_control',
		'app.ente_de_control',
		'app.municipio',
		'app.ente',
		'app.ente_empleado',
		'app.empleado',
		'app.denuncia_empleado',
		'app.denuncia',
		'app.denuncia_denunciado',
		'app.denunciante',
		'app.ente_titulare',
		'app.titulare',
		'app.ente_control_titulare',
		'app.titulo',
		'app.nivel',
		'app.auditor_auditoria',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.requerimiento',
		'app.conclusion',
		'app.recomendacion',
		'app.credencial',
		'app.cedula_auditoria',
		'app.objetivos_auditoria',
		'app.observacion_auditoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Poa = ClassRegistry::init('Poa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Poa);

		parent::tearDown();
	}

}
