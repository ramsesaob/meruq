<?php
App::uses('ObjetivosAuditoria', 'Model');

/**
 * ObjetivosAuditoria Test Case
 */
class ObjetivosAuditoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.objetivos_auditoria',
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
		'app.poa',
		'app.requerimiento',
		'app.conclusion',
		'app.recomendacion',
		'app.credencial',
		'app.cedula_auditoria',
		'app.observacion_auditoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ObjetivosAuditoria = ClassRegistry::init('ObjetivosAuditoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ObjetivosAuditoria);

		parent::tearDown();
	}

}
