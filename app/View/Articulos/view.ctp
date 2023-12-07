<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodegasped
 */
?>
<?php
 
//debug($articulos);
?>

<div class="articulos view large-9 medium-8 columns content">
    <h3><?php echo $articulos['Articulo']['DESCRIPCION']; ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CODIGO') ?></th>
            <td><?php echo $articulos['Articulo']['ARTICULO']; ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('PRECIO') ?></th>
            <td>$<?php echo $articulos['Articulo']['VENTA']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TIEMPO DE GARANTÌA') ?></th>
            <td><?php echo $articulos['Articulo']['GARANTIA']; ?> DÌAS</td>
        </tr>
        <tr>
            <th scope="row"><?= __('DESCUENTO MAX') ?></th>
            <td><?php echo $articulos['Articulo']['DESCUENTO']; ?> %</td>
        </tr>
        <tr>
           
            <td>
                 <?php echo $this->Html->image('../files/articulo/foto/' . $articulos['Articulo']['foto_dir'] . '/' . 'thumb_' .$articulos['Articulo']['foto'], array('url' => array('controller' => 'articulos', 'action' => 'view', $articulos['Articulo']['id']))); ?>
        </td>
        </tr>
        
    </table>
</div>
<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'articulos', 'action' => 'view2')); ?></div> 
            </div>
          
            </div>
                    </ol> 
                   
            </section>
