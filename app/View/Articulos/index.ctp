<?php echo $this->Html->script( array('addtocart.js'), array('inline' => false) ); ?>   






<div class="auditorias index">
    <legend><b><H2><?php echo __('Lista de Articulos'); ?>  </H2></b></legend>


   

    <table class="table table-striped text-centerr" style="text-align: center;">
    <thead> 
    <tr>
            
            
                
                <th><?php echo $this->Paginator->sort('CODIGO'); ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <th><?php echo $this->Paginator->sort('foto'); ?></th>
                <th><?php echo $this->Paginator->sort('DESCRIPCION'); ?></th>
                <th><?php echo $this->Paginator->sort('PRECIO'); ?></th> 
                <th><?php echo $this->Paginator->sort('Acciones'); ?></th>
               
              
        
             
            </tr>
        </thead>
        <tbody>
   <?php foreach ($articulos as $articulo): ?>
            <tr>
               
                <td><?php echo h($articulo['Articulo']['ARTICULO']); ?>&nbsp;</td>
                <td>
                        <?php echo $this->Html->image('../files/articulo/foto/' . $articulo['Articulo']['foto_dir'] . '/' . 'thumb_' .$articulo['Articulo']['foto'], array('url' => array('controller' => 'articulos', 'action' => 'view', $articulo['Articulo']['id']))); ?>
                </td>
                 
                <td><?php echo $this->Html->link($articulo['Articulo']['DESCRIPCION'], array('controller' => 'articulos', 'action' => 'view', $articulo['Articulo']['id'])); ?>&nbsp;</td>
                 <td><?php echo h($articulo['Articulo']['VENTA']); ?>&nbsp;</td>
                 <td><?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>',  array('action' => 'edit', $articulo['Articulo']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?></td>
             
                
               
                   
              
            </tr>
            <?php endforeach; ?>
    </tbody>
    </table>

    <p>
   <?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, muestra {:current} de un total de {:count}, comienza en el registro {:start} y finaliza en el registro {:end}')));?>    </p>
        <ul class="pagination">
            <li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
            <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
            <li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
        </ul>
</div>
    