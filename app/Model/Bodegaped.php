<?php
App::uses('AppModel', 'Model');
/**
 * Mesa Model
 *
 * @property Mesero $Mesero
 */
class Bodegaped extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'PED_EXIS';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ARTICULO' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'BODEGA' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		'EXISTENCIA' => array(
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
	/*public $hasMany = array(
		
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'cliente_id',
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
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'cliente_id',
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
	*/
	 public $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id'
        ),
          'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
   
    );

	
	

public $hasMany = array(
        'Pedido' => array(
            'className' => 'Pedido',
            'foreignKey' => 'bodegaped_id',
            'dependent' => false
        ),
         'OrdenItem' => array(
            'className' => 'OrdenItem',
            'foreignKey' => 'bodegaped_id',
            'dependent' => false
      ),

    );
}