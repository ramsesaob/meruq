 <?php
  //  debug($bodegapeds);
  ?>
<?php echo $this->Html->script( array('addtocart.js'), array('inline' => false) ); ?> 


      <strong> BUSCAR ARTICULOS EN BODEGA 15</strong>


<br>

<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'pages', 'action' => 'home')); ?></div> 
            </div>
          
            
                    </ol> 
                   
            </section>

      
      
<br>
<?php if($ajax != 1): ?>

    <div class="row">
        <?php echo $this->Form->create('Bodega', array('type' => 'GET')); ?>
        
        <div class="col-sm-4">
           <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search, 'placeholder' => 'Escriba el Còdigo o la Descripcion del articulo aqui...')); ?>
        
        
  
        
         <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => ' btn btn-primary glyphicon glyphicon-search')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
        
    </div>

    <br><br>
<?php endif; ?>

<?php if(!empty($search)): ?>

    <?php if(!empty($bodegapeds) ): ?>
   
    
    <div class="row">
        <?php foreach($bodegapeds as $bodegaped): ?> 
             

                

             <div class="col-sm-3 flash-msg" id="row-<?php echo $bodegaped['Bodegaped']['id']; ?>">
              

               <br>
              <strong> CODIGO: </strong><?php echo ($bodegaped['Bodegaped']['CODIGO']); ?>
                <br>
                
             <strong>DESCRIPCION: </strong><?php echo $this->Html->link($bodegaped['Bodegaped']['DESCRIPCION'], array('action' => 'view2', $bodegaped['Bodegaped']['id'])); ?>
                <br>
             <strong>PRECIO DE VENTA: </strong> <?php echo number_format($bodegaped['Bodegaped']['VENTA'], 2, ',', ''); ?>$ 
                <br>
              <strong>BODEGA: </strong> <?php echo $this->Html->link($bodegaped['Bodegaped']['BODEGA'], array('action' => 'view', $bodegaped['Bodegaped']['id'])); ?>
                <br>
              <strong>EXISTENCIA: </strong><?php echo $bodegaped['Bodegaped']['EXISTENCIA'] ;?>
              <br>
              <strong>PEDIDO: </strong><?php echo $bodegaped['Bodegaped']['cantped'] ;?>
                <br>
               
             
                
            </div>
                
               
    
        <?php endforeach; ?>
    </div>
     
<div align="center" >
    <ul class="pagination " align="center">
            <?php
        

                echo $this->Paginator->prev(__('ant'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
               
                echo $this->Paginator->next(__('sig'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
         
        </ul>
    </div>
    
    <?php else: ?>
    
    <h3>No se encontró el ARTICULO que busca :-( </h3>
    
    <?php endif; ?>

<?php endif; ?>