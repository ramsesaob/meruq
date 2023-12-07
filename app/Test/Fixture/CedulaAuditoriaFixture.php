<?php
/**
 * CedulaAuditoria Fixture
 */
class CedulaAuditoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'descripcion_cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'condicion_cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'criterio cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'causa_cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'efecto_cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pruebas_cedula' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_cedula' => array('type' => 'date', 'null' => false, 'default' => null),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'objetivos_auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_cedula_auditoria_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'fk_cedula_auditoria_objetivos_auditoria1_idx' => array('column' => 'objetivos_auditoria_id', 'unique' => 0)
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
			'descripcion_cedula' => 'Lorem ipsum dolor sit amet',
			'condicion_cedula' => 'Lorem ipsum dolor sit amet',
			'criterio cedula' => 'Lorem ipsum dolor sit amet',
			'causa_cedula' => 'Lorem ipsum dolor sit amet',
			'efecto_cedula' => 'Lorem ipsum dolor sit amet',
			'pruebas_cedula' => 'Lorem ipsum dolor sit amet',
			'publicacion_cedula' => '2017-08-20',
			'estado_id' => 1,
			'objetivos_auditoria_id' => 1
		),
	);

}
