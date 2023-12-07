<?php
/**
 * Denunciante Fixture
 */
class DenuncianteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'ci_denunciante' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'nombre_denunciante' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'apellido_denunciante' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefo_denunciante' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 13, 'unsigned' => false),
		'email_denunciante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'celular_denunciante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dire_denunciante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'ci_denunciante' => 1,
			'nombre_denunciante' => 'Lorem ipsum dolor sit amet',
			'apellido_denunciante' => 'Lorem ipsum dolor sit amet',
			'telefo_denunciante' => 1,
			'email_denunciante' => 'Lorem ipsum dolor sit amet',
			'celular_denunciante' => 'Lorem ipsum',
			'dire_denunciante' => 'Lorem ipsum dolor sit amet'
		),
	);

}
