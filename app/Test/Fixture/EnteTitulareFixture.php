<?php
/**
 * EnteTitulare Fixture
 */
class EnteTitulareFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'fecha_ini_ente_titular' => array('type' => 'date', 'null' => false, 'default' => null),
		'titulare_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'ente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ente_titular_titular1_idx' => array('column' => 'titulare_id', 'unique' => 0),
			'fk_ente_titular_ente1_idx' => array('column' => 'ente_id', 'unique' => 0)
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
			'fecha_ini_ente_titular' => '2017-08-20',
			'titulare_id' => 1,
			'ente_id' => 1
		),
	);

}
