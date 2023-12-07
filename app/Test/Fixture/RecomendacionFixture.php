<?php
/**
 * Recomendacion Fixture
 */
class RecomendacionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'preliminar_recomendacion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'definitiva_recomendacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_recomendacion' => array('type' => 'date', 'null' => false, 'default' => null),
		'auditoria_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_recomendacion_auditoria1_idx' => array('column' => 'auditoria_id', 'unique' => 0),
			'fk_recomendacion_estado1_idx' => array('column' => 'estado_id', 'unique' => 0)
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
			'preliminar_recomendacion' => 'Lorem ipsum dolor sit amet',
			'definitiva_recomendacion' => 'Lorem ipsum dolor sit amet',
			'publicacion_recomendacion' => '2017-08-20',
			'auditoria_id' => 1,
			'estado_id' => 1
		),
	);

}
