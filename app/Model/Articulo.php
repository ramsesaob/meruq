<?php
App::uses('AppModel', 'Model');
/**
 * Articulo Model
 *

 */
class Articulo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'DESCRIPCION';
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

  /**  public $actsAs = array(
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
        ); */
/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'id' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'foto' => array(
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Algo anda mal, intente nuevamente',
                'on' => 'create'
            ),
            'isUnderPhpSizeLimit' => array(
                'rule' => 'isUnderPhpSizeLimit',
                'message' => 'Archivo excede el límite de tamaño de archivo de subida'
            ),
            'isValidMimeType' => array(
                'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
                'message' => 'La imagen no es jpg ni png',
            ),
            'isBelowMaxSize' => array(
                'rule' => array('isBelowMaxSize', 100048576),
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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
  
    
public $hasMany = array(
        
         'OrdenItem' => array(
            'className' => 'OrdenItem',
            'foreignKey' => 'articulo_id',
            'dependent' => false
      ),
         'Bodegaped' => array(
            'className' => 'Bodegaped',
            'foreignKey' => 'articulo_id',
            'dependent' => false
      )
    );
 


/**
 * hasAndBelongsToMany associations
 *
 * @var array
*/
  
function checkUniqueName($data)
    {
        $isUnique = $this->find('first', array('fields' => array('Articulo.foto'), 'conditions' => array('Articulo.foto' => $data['foto'])));

        if(!empty($isUnique))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

}




