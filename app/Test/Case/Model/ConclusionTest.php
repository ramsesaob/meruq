<?php
App::uses('Conclusion', 'Model');

/**
 * Conclusion Test Case
 */
class ConclusionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conclusion',
		'app.auditoria',
		'app.estatus_auditoria',
		'app.tipo_auditoria',
		'app.poa',
		'app.requerimiento',
		'app.recomendacion',
		'app.estado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Conclusion = ClassRegistry::init('Conclusion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Conclusion);

		parent::tearDown();
	}

}
