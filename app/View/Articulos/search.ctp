


<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'articulos', 'action' => 'existencia')); ?></div> 
            </div>
            <div class="pull-right tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-right" target="_blank" >
             <?php echo $this->Html->link('SIGUIENTE', array('controller' => 'pedidos', 'action' => 'view')); ?>
         </div>
            </div>
                    </ol> 
                   
            </section>
<br>
<section class="content-header">


<?php if($ajax != 1): ?>

   
    <br>
    <div class="row" id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
    
        <?php echo $this->Form->create('Articulo', array('type' => 'GET')); ?>
        
        <div class="col-sm-4">
            <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control', 'autocomplet' => 'off', 'value' => $search)); ?>
        </div>
        
  
        
        <div class="col-sm-3">
           
           <?php echo $this->Form->button('Buscar', array('div' => false, 'class' => ' btn btn-primary glyphicon glyphicon-search')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
        
    </div> 

    <br>
<?php endif; ?>

<?php if(!empty($search)): ?>

    <?php if(!empty($articulos)): ?>
    
    

        <?php foreach($articulos as $articulo): ?> 


            <div class="col-sm-3 flash-msg" id="row-<?php echo $articulo['Articulo']['id']; ?>">
                
              <!--  <p>agregado</p> -->
              
                   

                       


                      
                     
               
               
             <h5>CODIGO: <?php echo h($articulo['Articulo']['ARTICULO']); ?></h5>  
           
           
                <h5>DESCRIPCION:  <?php echo h($articulo['Articulo']['DESCRIPCION']); ?></h5>
             
              
              
                 <h5>PRECIO:  $ <?php echo h($articulo['Articulo']['VENTA']); ?></h5>
                <div class="col-sm-3 flash-msg" id="VENTA-<?php echo $articulo['Articulo']['id']; ?>">
                <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>',  array('action' => 'edit', $articulo['Articulo']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?>
                </div>
               
               
                <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>

        <ul class="pagination">
            <li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
            <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
            <li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
        </ul>
    <?php else: ?>
    
    <h3>No se encontró el Cliente que busca :-( </h3>
    
    <?php endif; ?>

<?php endif; ?>
          