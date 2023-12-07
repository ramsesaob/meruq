<?php

class OrdenItem extends AppModel {
    
	public $belongsTo = array(
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'orden_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Bodegaped' => array(
			'className' => 'Bodegaped',
			'foreignKey' => 'bodegaped_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);  
	public $hasMany = array(
        'Pedido' => array(
            'className' => 'Pedido',
            'foreignKey' => 'orden_items_id',
            'dependent' => false
        ),
       

    );  
    
}

?>