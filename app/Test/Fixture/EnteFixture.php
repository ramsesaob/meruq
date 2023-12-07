<?php
/**
 * Ente Fixture
 */
class EnteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'nombre_ente' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'rif_ente' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'abreviacion_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'siglas_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono1_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono2_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fax_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'twitter_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pagina_web_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'direccion_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'doc_creacion_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fech_creacion_ente' => array('type' => 'date', 'null' => true, 'default' => null),
		'mision_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'vision_ente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_ente' => array('type' => 'date', 'null' => true, 'default' => null),
		'ente_rector' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false),
		'municipio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ente_municipio1_idx' => array('column' => 'municipio_id', 'unique' => 0),
			'fk_ente_estado1_idx' => array('column' => 'estado_id', 'unique' => 0)
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
			'nombre_ente' => 'Lorem ipsum dolor sit amet',
			'rif_ente' => 'Lorem ipsu',
			'abreviacion_ente' => 'Lorem ipsum dolor sit amet',
			'siglas_ente' => 'Lorem ipsum d',
			'telefono1_ente' => 'Lorem ipsum',
			'telefono2_ente' => 'Lorem ipsum',
			'fax_ente' => 'Lorem ipsum',
			'email_ente' => 'Lorem ipsum dolor sit amet',
			'twitter_ente' => 'Lorem ipsum dolor sit amet',
			'pagina_web_ente' => 'Lorem ipsum dolor sit amet',
			'direccion_ente' => 'Lorem ipsum dolor sit amet',
			'doc_creacion_ente' => 'Lorem ipsum dolor sit amet',
			'fech_creacion_ente' => '2017-08-20',
			'mision_ente' => 'Lorem ipsum dolor sit amet',
			'vision_ente' => 'Lorem ipsum dolor sit amet',
			'publicacion_ente' => '2017-08-20',
			'ente_rector' => 1,
			'municipio_id' => 1,
			'estado_id' => 1
		),
	);

}
