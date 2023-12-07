<?php
/**
 * ObjetivosAuditoria Fixture
 */
class ObjetivosAuditoriaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'descripcion_objetivos' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_objetivos' => array('type' => 'date', 'null' => true, 'default' => null),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_objetivos_auditoria_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'fk_objetivos_auditoria_auditoria1_idx' => array('column' => 'auditoria_id', 'unique' => 0)
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
			'descripcion_objetivos' => 'Lorem ipsum dolor sit amet',
			'publicacion_objetivos' => '2017-08-20',
			'estado_id' => 1,
			'auditoria_id' => 1
		),
	);

}
