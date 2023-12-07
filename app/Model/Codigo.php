<?php
App::uses('AppModel', 'Model');
/**
 * Mesa Model
 *
 * @property Mesero $Mesero
 */
class Codigo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'DESCRIPCION';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'CODIGO' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'DESCRIPCION' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'TIPO' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasMany = array(
		
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'codigo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		
	);


public $hasAndBelongsToMany = array(
	'Orden' =>array(
		'className' => 'Orden',
		'joinTable' => 'codigos_ordens',
		'foreignKey' => 'codigo_id',
		'associationForeignKey' => 'orden_id'
		)
		);
	

	
	
}
