<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		  'username' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Usuario obligatorio',
				'allowEmpty' => false
            ),
			'between' => array( 
				'rule' => array('between', 4, 20), 
				'required' => true, 
				'message' => 'El usuario debe contener entre 5 y 20 caracteres'
			),
			
				'unique' =>  array(
				'rule' => array('isUnique'),
				'message' => 'Usuario en uso',
			),
			'alphaNumeric' => array(
				'rule'    => array('alphaNumeric'),
				'message' => 'El nombre de usuario solo puede contener letras, números y guiones bajos'
			)
        ),
		  'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Contraseña obligatoria'
            ),
			'min_length' => array(
				'rule' => array('minLength', '6'),  
				'message' => 'La contraseña debe tener al menos 6 caracteres'
			)
        ),
		
		/**'password_confirm' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Repite la contraseña'
            ),
			 'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Ambas contraseñas no coinciden'
			)
        ),*/
		
		'role' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
			'password_update' => array(
			'min_length' => array(
				'rule' => array('minLength', '6'),   
				'message' => 'La contraseña debe contener al menos 6 caracteres'
			)
        ),
		'password_confirm_update' => array(
			 'equaltofield' => array(
				'rule' => array('equaltofield','password_update'),
				'message' => 'Ambas contraseñas no coinciden'
			)
        ),
        
		'nombre' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellido' => array(
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
	public $hasMany = array(
		
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'user_id',
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
		'Bodegaped' => array(
			'className' => 'Bodegaped',
			'foreignKey' => 'user_id',
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
		'Reciboped' => array(
			'className' => 'Reciboped',
			'foreignKey' => 'user_id',
			'dependent' => false,
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
	
	public function beforeSave($options = array())
	{
		if(isset($this->data[$this->alias]['password']))
		{
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

}
