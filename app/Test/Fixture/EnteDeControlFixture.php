<?php
/**
 * EnteDeControl Fixture
 */
class EnteDeControlFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'nombre_ente_de_control' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'rif_ente_de_control' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'abreviacion_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'siglas_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono1_ente_de_control' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono2_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fax_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email_ente_de_control' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'twitter_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pagina_web_ente_de_control' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'publicacion_ente' => array('type' => 'date', 'null' => true, 'default' => null),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'municipio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ente_de_control_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'fk_ente_de_control_municipio1_idx' => array('column' => 'municipio_id', 'unique' => 0)
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
			'nombre_ente_de_control' => 'Lorem ipsum dolor sit amet',
			'rif_ente_de_control' => 'Lorem ipsu',
			'abreviacion_ente_de_control' => 'Lorem ipsum dolor sit amet',
			'siglas_ente_de_control' => 'Lorem ipsum d',
			'telefono1_ente_de_control' => 'Lorem ipsum',
			'telefono2_ente_de_control' => 'Lorem ipsum',
			'fax_ente_de_control' => 'Lorem ipsum',
			'email_ente_de_control' => 'Lorem ipsum dolor sit amet',
			'twitter_ente_de_control' => 'Lorem ipsum dolor sit amet',
			'pagina_web_ente_de_control' => 'Lorem ipsum dolor sit amet',
			'publicacion_ente' => '2017-08-20',
			'estado_id' => 1,
			'municipio_id' => 1
		),
	);

}
