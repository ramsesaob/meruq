<?php
/**
 * ObservacionAuditoria Fixture
 */
class ObservacionAuditoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'area_observacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'preliminar_observacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alegatos_observacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'definitiva_observacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_observacion' => array('type' => 'date', 'null' => true, 'default' => null),
		'auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'auditoria_id', 'estado_id'), 'unique' => 1),
			'auditoria_id_2' => array('column' => 'auditoria_id', 'unique' => 1),
			'fk_observacion_auditoria_auditoria1_idx' => array('column' => 'auditoria_id', 'unique' => 0),
			'fk_observacion_auditoria_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'auditoria_id' => array('column' => 'auditoria_id', 'unique' => 0)
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
			'area_observacion' => 'Lorem ipsum dolor sit amet',
			'preliminar_observacion' => 'Lorem ipsum dolor sit amet',
			'alegatos_observacion' => 'Lorem ipsum dolor sit amet',
			'definitiva_observacion' => 'Lorem ipsum dolor sit amet',
			'publicacion_observacion' => '2017-08-20',
			'auditoria_id' => 1,
			'estado_id' => 1
		),
	);

}
