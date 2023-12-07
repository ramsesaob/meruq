<?php
/**
 * Auditoria Fixture
 */
class AuditoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'num_auditoria' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false),
		'periodo_auditoria' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alcance_auditoria' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'objetivo_auditoria' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'inicio_estimado_auditoria' => array('type' => 'date', 'null' => false, 'default' => null),
		'fin_estimado_auditoria' => array('type' => 'date', 'null' => false, 'default' => null),
		'inicio_real_auditoria' => array('type' => 'date', 'null' => false, 'default' => null),
		'fin_real_auditoria' => array('type' => 'date', 'null' => false, 'default' => null),
		'estatus_auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'tipo_auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'poa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'requerimiento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_auditoria_estatus_auditoria1_idx' => array('column' => 'estatus_auditoria_id', 'unique' => 0),
			'fk_auditoria_tipo_auditoria1_idx' => array('column' => 'tipo_auditoria_id', 'unique' => 0),
			'fk_auditoria_poa1_idx' => array('column' => 'poa_id', 'unique' => 0),
			'fk_auditoria_requerimiento1_idx' => array('column' => 'requerimiento_id', 'unique' => 0)
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
			'num_auditoria' => 1,
			'periodo_auditoria' => 'Lorem ipsum dolor sit amet',
			'alcance_auditoria' => 'Lorem ipsum dolor sit amet',
			'objetivo_auditoria' => 'Lorem ipsum dolor sit amet',
			'inicio_estimado_auditoria' => '2017-08-20',
			'fin_estimado_auditoria' => '2017-08-20',
			'inicio_real_auditoria' => '2017-08-20',
			'fin_real_auditoria' => '2017-08-20',
			'estatus_auditoria_id' => 1,
			'tipo_auditoria_id' => 1,
			'poa_id' => 1,
			'requerimiento_id' => 1
		),
	);

}
