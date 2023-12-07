<?php
App::uses('EstatusAuditoria', 'Model');

/**
 * EstatusAuditoria Test Case
 */
class EstatusAuditoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estatus_auditoria',
		'app.auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.conclusion',
		'app.estado',
		'app.auditor',
		'app.area_control',
		'app.ente_de_control',
		'app.municipio',
		'app.ente_control_titulare',
		'app.titulare',
		'app.titulo',
		'app.nivel',
		'app.auditor_auditoria',
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
		'app.observacion_auditoria',
		'app.recomendacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EstatusAuditoria = ClassRegistry::init('EstatusAuditoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EstatusAuditoria);

		parent::tearDown();
	}

}
