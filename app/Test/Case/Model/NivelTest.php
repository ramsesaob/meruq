<?php
App::uses('Nivel', 'Model');

/**
 * Nivel Test Case
 */
class NivelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nivel',
		'app.auditor',
		'app.area_control',
		'app.ente_de_control',
		'app.estado',
		'app.cedula_auditoria',
		'app.objetivos_auditoria',
		'app.conclusion',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.recomendacion',
		'app.credencial',
		'app.auditor_auditoria',
		'app.ente',
		'app.municipio',
		'app.ente_empleado',
		'app.empleado',
		'app.denuncia_empleado',
		'app.denuncia',
		'app.denuncia_denunciado',
		'app.denunciante',
		'app.ente_titulare',
		'app.titulare',
		'app.observacion_auditoria',
		'app.ente_control_titulare',
		'app.titulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nivel = ClassRegistry::init('Nivel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nivel);

		parent::tearDown();
	}

}
