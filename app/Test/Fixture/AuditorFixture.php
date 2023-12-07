<?php
/**
 * Auditor Fixture
 */
class AuditorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'ci_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nombre_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'apellido_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'direccion_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono_auditor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'celular_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cargo_auditor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'login_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pass_auditor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'area_control_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'titulo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false, 'key' => 'index'),
		'nivel_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ci_usuario_UNIQUE' => array('column' => 'ci_auditor', 'unique' => 1),
			'fk_auditor_area_control1_idx' => array('column' => 'area_control_id', 'unique' => 0),
			'fk_auditor_titulo1_idx' => array('column' => 'titulo_id', 'unique' => 0),
			'fk_auditor_estado1_idx' => array('column' => 'estado_id', 'unique' => 0),
			'fk_auditor_nivel1_idx' => array('column' => 'nivel_id', 'unique' => 0)
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
			'ci_auditor' => 'Lorem ip',
			'nombre_auditor' => 'Lorem ipsum dolor sit amet',
			'apellido_auditor' => 'Lorem ipsum dolor sit amet',
			'email_auditor' => 'Lorem ipsum dolor sit amet',
			'direccion_auditor' => 'Lorem ipsum dolor sit amet',
			'telefono_auditor' => 'Lorem ipsum',
			'celular_auditor' => 'Lorem ipsum',
			'cargo_auditor' => 'Lorem ipsum dolor sit amet',
			'login_auditor' => 'Lorem ipsum d',
			'pass_auditor' => 'Lorem ipsum d',
			'area_control_id' => 1,
			'titulo_id' => 1,
			'estado_id' => 1,
			'nivel_id' => 1
		),
	);

}
