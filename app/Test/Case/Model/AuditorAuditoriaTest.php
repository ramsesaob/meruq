<?php
App::uses('AuditorAuditoria', 'Model');

/**
 * AuditorAuditoria Test Case
 */
class AuditorAuditoriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auditor_auditoria',
		'app.auditor',
		'app.auditoria',
		'app.credencial'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AuditorAuditoria = ClassRegistry::init('AuditorAuditoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AuditorAuditoria);

		parent::tearDown();
	}

}
