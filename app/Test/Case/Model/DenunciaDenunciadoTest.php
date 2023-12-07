<?php
App::uses('DenunciaDenunciado', 'Model');

/**
 * DenunciaDenunciado Test Case
 */
class DenunciaDenunciadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.denuncia_denunciado',
		'app.denunciante',
		'app.denuncia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DenunciaDenunciado = ClassRegistry::init('DenunciaDenunciado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DenunciaDenunciado);

		parent::tearDown();
	}

}
