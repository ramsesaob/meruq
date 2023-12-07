<?php
App::uses('Municipio', 'Model');

/**
 * Municipio Test Case
 */
class MunicipioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.municipio',
		'app.ente_de_control',
		'app.estado',
		'app.auditor',
		'app.area_control',
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
		'app.cedula_auditoria',
		'app.objetivos_auditoria',
		'app.ente',
		'app.ente_empleado',
		'app.empleado',
		'app.denuncia_empleado',
		'app.denuncia',
		'app.denuncia_denunciado',
		'app.denunciante',
		'app.ente_titulare',
		'app.titulare',
		'app.observacion_auditoria',
		'app.ente_control_titulare'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Municipio = ClassRegistry::init('Municipio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Municipio);

		parent::tearDown();
	}

}
