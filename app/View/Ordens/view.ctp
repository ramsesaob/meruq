




     <div class="ordens view">
  

<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 0.2cm;
                margin-left:0.2cm;
                margin-right: 0.5cm;
                margin-bottom: 0.5cm;
                
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 0.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 0.5cm;
            }
        table {
     		
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 10PX;
               max-width: 90%;
               	}
        items {
        	font-size: 0.8em;
        }
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
        	font-size: 0.8em;
        }
          
        </style>
        <meta charset="utf-8">
    
    <title></title>
  
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
      
                


              
                  <TABLE width= 100%>
                    <TR>
                        <TD align="left" width= 10% height="10%" >  
                        	 <?php echo $this->Html->image('Imagen1.jpg', array('alt' => 'CakePHP'))?>
                           </TD>

                            
                        

                    </TR>
    
                </TABLE>
     
     
         <table  WIDTH="100%" >
             <tr>
                 <td>
                     <section class="content-header">
        <h5> 
        	<div >
              <u>   Nº PEDIDO:</u> <strong><?php echo h($orden['Orden']['numpedido']); ?>  </strong>
            </div>
            <div >
              <u>   FECHA:</u> <strong>  <?php echo h($orden['Orden']['created']); ?> </strong>
            </div>
        	 <div >
              <u>   CLIENTE:</u> <strong><?php echo h($orden['Cliente']['DESCRIPCION']); ?> </strong>
            </div>

            <div >
               <u>   RIF/CI:</u> <strong><?php echo h($orden['Cliente']['CLIENTE']); ?> </strong>
            </div>

            <div>
                
              <u> VENDEDOR:</u> <strong><?php echo h($orden['User']['nombre']); ?></strong>
            </div>

            <div  >
              <u>  DIRECCION:</u> <strong><?php echo h($orden['Cliente']['DIRECCION']); ?><br> <?php echo h($orden['Cliente']['CIUDAD']); ?> </strong>
                
            </div>
        </h5>
                 </td>
                                               
                    <td align="right" >                                        
                       <h5 align="right" >  <div  align="right" >
                       <u align="right" >  -SUBTOTAL:</u> <strong align="right" ><?php echo number_format(($orden['Orden']['subtotal']), 3, '.', ''); ?> </strong>
                    
                    <div  align="right" >
                        
                      <u> -IVA 16%:</u> <strong> <?php echo number_format(($orden['Orden']['iva']), 3, '.', ''); ?></strong>
                    </div>

                    <div  align="right" >
                      <u align="right" >   -TOTAL:</u> <strong align="right" ><?php echo number_format(($orden['Orden']['total']), 3, '.', ''); ?> </strong></h5>
                        
                    </div>
                
            </td>
        </tr>
    </table>
    <br>
    <?php if (!empty($orden['OrdenItem'])): ?>
    <table  class="table table-striped border text-center">
        <thead>
        	<tbody>
                <tr>
                        <th><u><?php echo ('COD PROD'); ?></u></th>
                        <th><u><?php echo ('ARTICULO'); ?></u></th>
                        
                        <th><u><?php echo ('UND'); ?> </u></th>
                        <th><u><?php echo ('PRECIO'); ?></u></th>
                       
                        <th><u><?php echo ('SUBOTAL'); ?></u></th>
                </tr>
        </thead>


                <?php foreach ($orden['OrdenItem'] as $ordenitems): ?>
        
                    <tr align="CENTER" class="items">
                        <td class="items"><?php echo $ordenitems['Bodegaped']['CODIGO']; ?></td>
                        <td class="items"><?php echo $ordenitems['Bodegaped']['DESCRIPCION']; ?></td>
                    
                        <td class="items">
                           <?php echo $ordenitems['cantidad']; ?>
                        </td>

                        <td class="items">$<?php echo number_format($ordenitems['preciodesc'], 3, '.', ''); ?></td>
                      
                       <td class="items">$<?php echo number_format($ordenitems['subtotal'], 3, '.', ''); ?></td>

                    </tr> 
                 <?php endforeach; ?>
    <?php endif; ?>
             </tbody>
    </table>
        <br>
        <TABLE border="0.1"  rules="groups" WIDTH="100%">

                <COLGROUP align="center">
                <COLGROUP align="left">
                <COLGROUP align="center" span="2">
                <COLGROUP align="center" span="3">

                <THEAD valign="top">
            <TR>
                <TH align="left">OBSERVACIONES: </TH>
                <TH></TH>

            </TR>


            <TR>
                <TD><?php echo h($orden['Orden']['comentario']); ?>
                <TD align="right">

                <strong>-SUBTOTAL: $ <?php echo number_format(($orden['Orden']['subtotal']), 3, '.', ''); ?></strong>
                    <br>  -IVA 16%: <strong> $<?php echo number_format(($orden['Orden']['iva']), 3, '.', ''); ?></strong>
                    <br>_________________
                    <br>TOTAL:  $  <?php echo number_format(($orden['Orden']['total']), 3, '.', ''); ?>
                </TD>
            </TR>

        </TABLE>
    <br>
<div>
    <?php if (!empty($orden['Orden']['tipo_doc'])): ?> 
                <table align="center">                  
                        <tr>
                            <td>
                               <li><?php echo __('EL PEDIDO HA SIDO PROCESADO EN UN DOCUMENTO EL TIPO ES'); ?> <strong><?php echo h($orden['Orden']['tipo_doc']); ?></strong> <?php echo __('CON NUMERO'); ?> <strong><?php echo h($orden['Orden']['numero']); ?></strong> <?php echo __('Y FECHA DE EMISIÒN'); ?> <strong><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['fecha'])); ?></strong> </li>
                            </td>
                         </tr>   
                        <tr>
                            <td>
                                <?php if (!empty($orden['Orden']['tipo_log'])): ?> 
                                  <li>  <?php echo __('LA'); ?> <strong><?php echo h($orden['Orden']['tipo_doc']); ?></strong> <?php echo __('DE Nº'); ?> <strong><?php echo h($orden['Orden']['numero']); ?></strong> <?php echo __('HA SIDO LIBERADA, EL DÌA '); ?> <?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['fecha_log'])); ?></li>
                                    <?php else : echo __('EL DOCUMENTO NO HA SIDO LIBERADO');?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if (!empty($orden['Orden']['ESTATUS'])): ?> 
                                  <li>  <?php echo __('LA'); ?> <strong><?php echo h($orden['Orden']['tipo_doc']); ?></strong> <?php echo __('DE Nº'); ?> <strong><?php echo h($orden['Orden']['numero']); ?></strong> <?php echo __('HA SIDO'); ?> <strong><?php echo h($orden['Orden']['ESTATUS']); ?></strong><?php echo __(', EL DÌA'); ?> <?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['fecha_modif'])); ?></li>
                                    <?php else : echo __('EL DOCUMENTO NO HA SIDO EMITIDO');?> 
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="success">
                            <td >
                                <?php if (!empty($orden['Orden']['despacho'])): ?> 
                                  <li>  <?php echo __('LA'); ?> <strong><?php echo h($orden['Orden']['tipo_doc']); ?></strong> <?php echo __('DE Nº'); ?> <strong><?php echo h($orden['Orden']['numero']); ?></strong> <?php echo __('SE'); ?> <strong><?php echo h($orden['Orden']['despacho']); ?></strong><?php echo __(', EL DÌA'); ?> <?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['fecha_despacho'])); ?></li>
                                    <?php else : echo __('EL DOCUMENTO NO HA SIDO DESPACHADO, EL DÌA');?> 
                                <?php endif; ?>
                            </td>
                        </tr>
                </table>
            <?php else : echo __('El pedido No ha sido procesado como ningun documento');?>
            <?php endif; ?>

</div>
<br>
    <button class="activebtn btn-outline-info glyphicon glyphicon-save" type="button" style="color:#37b5dd;" ><i style="color:#ffffff;"></i> <?php echo $this->Html->link(__('PDF'),array('action' => 'view', $orden['Orden']['id'], 'ext' => '.pdf')); ?></button>
<br>
<br>
    <button class="activebtn btn-outline-info glyphicon glyphicon-trash" type="button" style="color:#37b5dd;" ><i style="color:#ffffff;"></i> <?php echo $this->Form->postLink('ELIMINAR PEDIDO', array('action' => 'delete', $orden['Orden']['id']), array('confirm' => __('Esta seguro que desea borrar este Pedido?', $orden['Orden']['id']), 'class'    => 'tip', 'escape'   => false, 'title' => 'borrar')); ?></button>

   
  
</html>









<!--


    <dl>
        <dt><?php echo __('Nombre del Cliente:'); ?></dt>
        <dd>
            <?php echo $this->Html->link($orden['Cliente']['DESCRIPCION'], array('controller' => 'clientes', 'action' => 'view', $orden['Cliente']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Vendedor:'); ?></dt>
        <dd>
          <?php echo $this->Html->link($orden['User']['nombre'], array('controller' => 'users', 'action' => 'view', $orden['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fecha de la Orden:'); ?></dt>
        <dd>
            <?php echo h($orden['Orden']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Forma de Pago:'); ?></dt>
        <dd>
           <?php echo h($orden['Codigo']['DESCRIPCION']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Transporte Asignado:'); ?></dt>
        <dd>
            <?php echo h($orden['Orden']['transporte']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tipo de Pago:'); ?></dt>
        <dd>
            <?php echo h($orden['Orden']['pago']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Informaciòn Extra:'); ?></dt>
        <dd>
           <?php echo h($orden['Orden']['comentario']); ?>
            &nbsp;
        </dd>
    </dl>
    <h2><em><strong><?php echo __('Articulos Agregados a la Orden'); ?></strong></em></h2>
    <?php if (!empty($orden['OrdenItem'])): ?>
    <?php foreach ($orden['OrdenItem'] as $ordenitems): ?>
        <div class="row" id="row-<?php echo $ordenitems['id']; ?>">

        <div class="col col-sm-1">
                <strong>*   Nº Orden :  </strong><?php echo $ordenitems['orden_id']; ?>
            </div>
            <div class="col col-sm-1">
                <strong>*   ARTICULO:   </strong><?php echo $ordenitems['Bodegaped']['DESCRIPCION']; ?>
            </div>

            <div class="col col-sm-4">
                
                <strong>*CANTIDAD:</strong> <?php echo $ordenitems['cantidad']; ?>
            </div>

            <div class="col col-sm-1" >
                <strong>* SUBOTAL:</strong><?php echo number_format($ordenitems['subtotal'], 2, '.', ''); ?>
                
            </div>


        <div class="col col-sm-1 text-align: center">
            <strong>*   %:</strong>     <?php echo $ordenitems['porcentaje']; ?>
        </div>
        
        
    </div>

    </br>
    <br>


<?php endforeach; ?>


<?php endif; ?>
</div>




<button class="activebtn btn-outline-info glyphicon glyphicon-save" type="button" style="color:#37b5dd;" ><i style="color:#ffffff;"></i> <?php echo $this->Html->link(__('PDF'),array('action' => 'view', $orden['Orden']['id'], 'ext' => '.pdf')); ?></button>
<br>
<br>
<button class="activebtn btn-outline-info glyphicon glyphicon-trash" type="button" style="color:#37b5dd;" ><i style="color:#ffffff;"></i> <?php echo $this->Form->postLink('ELIMINAR PEDIDO', array('action' => 'delete', $orden['Orden']['id']), array('confirm' => __('Esta seguro que desea borrar este Pedido?', $orden['Orden']['id']), 'class'    => 'tip', 'escape'   => false, 'title' => 'borrar')); ?></button>
