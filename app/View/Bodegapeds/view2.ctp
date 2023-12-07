<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodegasped
 */
?>
<?php
 
//debug($bodegapeds);
?>
<style type="text/css">
    .item-image2 img{
    width: 400px; 
    align-items: center;
  position: relative;
    min-height: 10vh;
   
    
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    }
</style>
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
            <td><?php echo $bodegapeds['Bodegaped']['EXISTENCIA']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PRECIO') ?></th>
            <td>$<?php echo $bodegapeds['Bodegaped']['VENTA']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TIEMPO DE GARANTÌA') ?></th>
            <td><?php echo $bodegapeds['Articulo']['GARANTIA']; ?> DÌAS</td>
        </tr>
        <tr>
            <th scope="row"><?= __('DESCUENTO MAX') ?></th>
            <td><?php echo $bodegapeds['Articulo']['DESCUENTO']; ?> %</td>
        </tr>
        <tr>
           
            <td >
             
        </td>
        </tr>
        
    </table>

</div>

<section class="item-image2">
    
      <?php echo $this->Html->image('../files/articulo/foto/' . $bodegapeds['Articulo']['foto_dir'] . '/' .$bodegapeds['Articulo']['foto'], array( 'class' => 'img-rounded')); ?>
   <!--   <img src="/meruq/img/../files/articulo/foto/3646/thumb_thumb_rc9yc.jpg.jpg" class="item-image2" alt=""> -->
  
</section>
<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'bodegapeds', 'action' => 'search2')); ?></div> 
            </div>
          
            </div>
                    </ol> 
                   
            </section>

