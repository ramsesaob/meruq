<?php

class Orden extends AppModel {
    
	public $validate = array(
	
		'user_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Ingrese nombre de cliente',

				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cliente_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Ingrese nombre de cliente',

				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);    
    
	public $belongsTo = array(
		  'Cliente' => array(
            'className' => 'cliente',
            'foreignKey' => 'cliente_id'
        ),
		   'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
		    'Codigo' => array(
            'className' => 'Codigo',
            'foreignKey' => 'codigo_id'
        )
       
    
   
    );
	
	public $hasMany = array(
		'OrdenItem' => array(
			'className' => 'OrdenItem',
			'foreignKey' => 'orden_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);	
	
	public $hasAndBelongsToMany = array(
	'Codigo' =>array(
		'className' => 'Codigo',
		'joinTable' => 'codigos_ordens',
		'foreignKey' => 'orden_id',
		'associationForeignKey' => 'codigo_id'
		)
		);
    
}

?>