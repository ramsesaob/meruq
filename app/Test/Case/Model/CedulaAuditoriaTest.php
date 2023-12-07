<?php
App::uses('CedulaAuditoria', 'Model');

/**
 * CedulaAuditoria Test Case
 */
class CedulaAuditoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cedula_auditoria',
		'app.estado',
		'app.objetivos_auditoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CedulaAuditoria = ClassRegistry::init('CedulaAuditoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CedulaAuditoria);

		parent::tearDown();
	}

}
