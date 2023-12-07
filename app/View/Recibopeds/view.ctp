
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodegasped
 */
?>
<?php
 
//debug($recibopeds);
?>

<div class="articulos view large-9 medium-8 columns content">
    <h3><?php echo $recibopeds['Cliente']['DESCRIPCION']; ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nº Racibo') ?></th>
            <td><?php echo $recibopeds['Reciboped']['id']; ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?php echo $recibopeds['Cliente']['DESCRIPCION']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pago Recibido') ?></th>
            <td>$<?php echo $recibopeds['Reciboped']['monto']; ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha del Recibo') ?></th>
            <td><?php echo $recibopeds['Reciboped']['created']; ?> </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comentario') ?></th>
            <td><?php echo $recibopeds['Reciboped']['comentario']; ?> </td>
        </tr>
        <tr>
           
            <td>
                 <?php echo $this->Html->image('../files/reciboped/foto/' . $recibopeds['Reciboped']['foto_dir'] . '/' . 'thumb_' .$recibopeds['Reciboped']['foto'], array('url' => array('controller' => 'recibopeds', 'action' => 'view', $recibopeds['Reciboped']['id']))); ?>
        </td>
        </tr>
        
    </table>
</div>
<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'recibopeds', 'action' => 'index')); ?></div> 
            </div>
          
            </div>
                    </ol> 
                   
            </section>
