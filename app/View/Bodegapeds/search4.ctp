 <?php
  //  debug($bodegapeds);
  ?>
<?php echo $this->Html->script( array('addtocart.js'), array('inline' => false) ); ?> 

<strong> BUSCAR ARTICULOS</strong>


<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'pedidos', 'action' => 'view2')); ?></div> 
            </div>
            <div class="pull-right tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-right" target="_blank" >
             <?php echo $this->Html->link('SIGUIENTE', array('controller' => 'pedidos', 'action' => 'view2')); ?>
         </div>
            </div>
                    </ol> 
                   
            </section>
<br>

<section class="content-header"> 
      
<br>
<?php if($ajax != 1): ?>

    <div class="row">
        <?php echo $this->Form->create('Bodega', array('type' => 'GET')); ?>
        
        <div class="col-sm-4">
            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search, 'placeholder' => 'Escriba el Còdigo o la Descripcion del articulo aqui...')); ?>
        </div>
        
  
        
        <div class="col-sm-3">
           <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => ' btn btn-primary glyphicon glyphicon-search')); ?>
        </div>
       
        <?php echo

         $this->Form->end(); 

         ?>
        
    </div>

    <br><br>
<?php endif; ?>

<?php if(!empty($search)): ?>

    <?php if(!empty($bodegapeds) ): ?>
   
    
    <div class="row">
        <?php foreach($bodegapeds as $bodegaped): ?> 
             

             <div class="col-sm-3 flash-msg" id="row-<?php echo $bodegaped['Bodegaped']['id']; ?>">
              

               <br>
              <strong> CODIGO:</strong><?php echo ($bodegaped['Bodegaped']['CODIGO']); ?>
                <br>
                
             <strong>DESCRIPCION:</strong><?php echo $this->Html->link($bodegaped['Bodegaped']['DESCRIPCION'], array('action' => 'view2', $bodegaped['Bodegaped']['id'])); ?>
                <br>
             <strong>PRECIO DE VENTA:</strong> <?php echo ($bodegaped['Bodegaped']['VENTA']); ?>$ 
                <br>
              <strong>BODEGA:</strong> <?php echo $this->Html->link($bodegaped['Bodegaped']['BODEGA'], array('action' => 'view', $bodegaped['Bodegaped']['id'])); ?>
                <br>
              <strong>EXISTENCIA:</strong><?php echo $bodegaped['Bodegaped']['EXISTENCIA'] ;?>
                
                <br>
                 <?php
                echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>', '#', array('escapeTitle' => false, 'title' => 'Agregar item', 'id' => $bodegaped['Bodegaped']['id'], 'class' => 'btn btn-primary addtocart'));?>

                <br>
                
            </div>
           
                
               
    
        <?php endforeach; ?>
    </div>
     

    
    <?php else: ?>
    
    <h3>No se encontró el ARTICULO que busca o se encuentra agotado </h3>
    
    <?php endif; ?>

<?php endif; ?>