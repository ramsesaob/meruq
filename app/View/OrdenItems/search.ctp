 <?php
    
//debug($pedidos);
  ?>
<?php echo $this->Html->script(array('cart3.js', 'jquery.animate-colors'), array('inline' => false)); ?>
 <?php echo $this->Form->create('OrdenItem', array('type' => 'GET')); ?>
        
             
        <br>
        <?php if($ajax != 1): ?>

            <div class="row">
                
                
                <div class="col-sm-4">
                    <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search, 'placeholder' => 'Escriba elnùmero de la orden aqui...')); ?>
                </div>
                
          
                
                <div class="col-sm-3">
                   <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => ' btn btn-primary glyphicon glyphicon-search')); ?>
                </div>
               
                <?php echo

                 $this->Form->end(); 

                 ?>
               <?php echo $this->Form->create('Pedido'); ?>
    </div>

    <br><br>
<?php endif; ?>
<?php $tabindex = 1; ?>
<?php if(!empty($search)): ?>

    <?php if(!empty($ordenitems) ): ?>
    
    
    <div class="row">
        <?php $i= end($ordenitems); ?>
        <?php foreach( array($i) as $ordenitem):  ?> 
         
      
            
      <h4>  <li>  <strong>Nº Orden:</strong>   <?php  echo $ordenitem['Orden']['id'];  ?>
         
          <li> <strong>Cliente:</strong> <?php echo $ordenitem['Orden']['Cliente']['DESCRIPCION']; ?></li>
          
         <li>  <strong>Vendedor:</strong> <?php echo $ordenitem['Orden']['User']['nombre']; ?></li>
         
           <li><strong>Forma de Pago:</strong>   <?php  echo $ordenitem['Orden']['pago'];  ?></li>
         
           <li><strong>Tipo de pago:</strong> <?php echo $ordenitem['Orden']['Codigo']['DESCRIPCION']; ?></li>
         
           <li><strong>Comentario:</strong>   <?php  echo $ordenitem['Orden']['comentario'];  ?></li>
             </h4>

            
              <?php endforeach; ?>



             
               <h2>Articulos Agregados al Pedido</h2>
               <?php foreach($ordenitems as $ordenitem): ?> 
             
               <div class="row" id="row-<?php echo $ordenitem['OrdenItem']['id']; ?>">
       
        <div class="col col-sm-1">
        <strong>    -CODIGO:    </strong><?php echo $ordenitem['Bodegaped']['CODIGO']; ?>
        </div>

        <div class="col col-sm-4">
            <strong>
            -DESCRIPCION:</strong>  <?php echo $this->Html->link($ordenitem['Bodegaped']['DESCRIPCION'], array('controller' => 'bodegapeds', 'action' => 'view2', $ordenitem['Bodegaped']['id'])); ?>
            
        </div>

        <div class="col col-sm-1" id="price-<?php echo $ordenitem['OrdenItem']['id']; ?>">
            <strong>-PRECIO:</strong> $<?php echo $ordenitem['OrdenItem']['preciodesc']; ?>

        </div>

        <div class="col col-sm-1 " >
            
        <strong>-CANTIDAD:</strong> <?php echo $ordenitem['OrdenItem']['cantidad']; ?>
        </div>
        
       
        <div class="col col-sm-1">
            <strong>    -DECUENTO MAX:  </strong><?php echo $ordenitem['Bodegaped']['Articulo']['DESCUENTO']; ?>%
        </div>

        <div class="col col-sm-1 text-align: center">
            <strong>    -%:</strong>    <?php echo $ordenitem['OrdenItem']['porcentaje']; ?>
           
        </div>

        <div class="col col-sm-2" style="background-color: none;" id= "subtotal_<?php echo $ordenitem['OrdenItem']['id']; ?>">
    <strong>-SUBTOTAL: </strong><?php echo number_format($ordenitem['OrdenItem']['subtotal'], 2, '.', ''); ?>
        </div>

    

        

    </div>
    __________________________________________________


    
        <?php endforeach; ?>
    </div>
     

    <?php else: ?>
    
    <h3>No se encontró El Pedido que busca </h3>
    
    <?php endif; ?>

<?php endif; ?>
  <h3><span class="total">Total Orden:</span></h3>
        <span id="total" class="total">
        <h2>    $ <?php echo $total_pedidos; ?></h2>
 
        </span>

        <div class="pull-right tr">

             
  <?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'btn btn-success')); ?>
    

    
    
        </div>

   