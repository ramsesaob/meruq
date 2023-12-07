<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodegasped
 */
?>
<?php echo $this->Html->script( array('addtocart.js'), array('inline' => false) ); ?>
<div class="bodegapeds view large-9 medium-8 columns content">
    <h3><?php echo $bodegapeds['Bodegaped']['DESCRIPCION']; ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CODIGO') ?></th>
            <td><?php echo $bodegapeds['Bodegaped']['CODIGO']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BODEGA') ?></th>
            <td><?php echo $bodegapeds['Bodegaped']['BODEGA']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXISTENCIA') ?></th>
            <td><?php echo number_format($bodegapeds['Bodegaped']['EXISTENCIA'], 0, ',', ''); ?> unds</td>
        </tr>
        <tr>
            <th scope="row"><?= __('PEDIDO') ?></th>
            <td><?php echo $bodegapeds['Bodegaped']['cantped']; ?> unds</td>
        </tr>
        <tr>
            <th scope="row"><?= __('PRECIO DE VENTA') ?></th>
            <td>$<?php echo $bodegapeds['Bodegaped']['VENTA']; ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('EXISTENCIA REAL') ?></th>
            <td><span id="exist_real_<?php echo $bodegapeds['Bodegaped']['id']; ?>"><?php echo ($bodegapeds['Bodegaped']['EXISTENCIA'] - $bodegapeds['Bodegaped']['cantped']); ?></span></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EMPAQUE DEL PRODUCTO') ?></th>
            <td><span id="empaque<?php echo $bodegapeds['Bodegaped']['id']; ?>"><?php echo $bodegapeds['Bodegaped']['empaque'] ;?></span></td>
        </tr>

        <tr><th>
            
       
          
             <?php
                echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>', '#', array('escapeTitle' => false, 'title' => 'Agregar item', 'id' => $bodegapeds['Bodegaped']['id'], 'class' => 'btn btn-primary addtocart'));?>
                 </th>
            </tr>
    </table>
</div>
<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                  <div class="active btn btn-primarybtn btn-light  " target="_blank" >
        
             <?php echo $this->Html->link(' Agregar mas Articulos', array('controller' => 'bodegapeds', 'action' => 'search')); ?></div> 
            </div>
            <div class="pull-right tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-right" target="_blank" >
             <?php echo $this->Html->link('SIGUIENTE', array('controller' => 'pedidos', 'action' => 'view')); ?>
         </div>
            </div>
                    </ol> 
                   
            </section>
