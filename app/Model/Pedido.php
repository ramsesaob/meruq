<?php
class Pedido extends AppModel {
    
    
    public $belongsTo = array(
      
         'Bodegaped' => array(
            'className' => 'Bodegaped',
            'foreignKey' => 'bodegaped_id'
        ),
         'OrdenItem' => array(
            'className' => 'OrdenItem',
            'foreignKey' => 'orden_items_id'
        )
     
       
      
    
   
    );
}
?>