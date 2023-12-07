<?php
/**
 * Credencial Fixture
 */
class CredencialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'emision_credencial' => array('type' => 'date', 'null' => false, 'default' => null),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'auditor_auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_credencial_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'fk_credencial_auditor_auditoria1_idx' => array('column' => 'auditor_auditoria_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'emision_credencial' => '2017-08-20',
			'estado_id' => 1,
			'auditor_auditoria_id' => 1
		),
	);

}
