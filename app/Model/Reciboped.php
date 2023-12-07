<?php
App::uses('AppModel', 'Model');
/**
 * Tickect Model
 *
 */
class Reciboped extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'solictud';
	//public $virtualFields = array('name' => 'CONCAT(Actividad.id, " ", Actividad.nombre_actuaciones)');

	public $actsAs = array(
            'Upload.Upload' => array(
                'foto' => array(
                    'fields' => array(
                        'dir' => 'foto_dir'
                    ),
                    'thumbnailMethod' => 'php',
                    'thumbnailSizes' => array(
                        'vga' => '640x480',
                        'thumb' => '150x150'
                    ),
                    'deleteOnUpdate' => true,
                    'deleteFolderOnDelete' => true
                )
            )
        );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(

		'foto' => array(
        	
	    	'isUnderPhpSizeLimit' => array(
	    		'rule' => 'isUnderPhpSizeLimit',
	        	'message' => 'Archivo excede el límite de tamaño de archivo de subida'
	        ),
		    'isValidMimeType' => array(
	    		'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
        		'message' => 'La imagen no es jpg ni png',
	    	),
		    'isBelowMaxSize' => array(
	    		'rule' => array('isBelowMaxSize', 10000048576),
        		'message' => 'El tamaño de imagen es demasiado grande'
	    	),
		    'isValidExtension' => array(
	    		'rule' => array('isValidExtension', array('jpg', 'png'), false),
        		'message' => 'La imagen no tiene la extension jpg o png'
	    	),
		    'checkUniqueName' => array(
                'rule' => array('checkUniqueName'),
                'message' => 'La imagen ya se encuentra registrada',
                'on' => 'update'
        	),		
			),
		
	
	);

	public $belongsTo = array(
  
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )

    
   
    );

 
}
