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
                margin-top: 0.8cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 0.5cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }
        table {
     
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                
            }
          
        </style>
        <meta charset="utf-8">
    <title></title>
  
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
      
                


                  <TABLE >
                    <TR>
                        <TD align="left">  
                            <img  src="<?= WWW_ROOT ?>img/Imagen1.jpg" width="40%" height="40%" align="left"/></TD>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                             <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                             <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                             <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                             <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                             <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            <td>                               </td>
                            
                         <TD align="right">
                            <div class="col col-sm-1" align="right">
                                 <u><strong>PEDIDO </strong></u>  
                                     
                                 
                                     
                                 
                            </div>
                             <div class="col col-sm-1" align="right">
                                  <?php echo h($orden['Orden']['numpedido']); ?> 
                            </div>
                            <div class="col col-sm-1" align="right">
                                 <?php echo h($orden['Orden']['created']); ?>
                            </div>
                        </TD> 

                    </TR>
    
                </TABLE>
     
         <table  WIDTH="100%" >
             <tr>
                 <td>
                     <section class="content-header">
        <h5>  <div class="col col-sm-1">
              <u>   CLIENTE:</u> <strong><?php echo h($orden['Cliente']['DESCRIPCION']); ?> </strong>
            </div>
            <div class="col col-sm-1">
               <u>   RIF/CI:</u> <strong><?php echo h($orden['Cliente']['CLIENTE']); ?> </strong>
            </div>

            <div class="col col-sm-1">
                
              <u> VENDEDOR:</u> <strong><?php echo h($orden['User']['nombre']); ?></strong>
            </div>

            <div class="col col-sm-2" >
              <u>  DIRECCION:</u> <strong><?php echo h($orden['Cliente']['DIRECCION']); ?><br> <?php echo h($orden['Cliente']['CIUDAD']); ?> </strong>
                
            </div>
        </h5>
                 </td>
                                               
                    <td align="right" >                                        
                
             
                       <h5 align="right" >  <div class="col col-sm-1" align="right" >
                       <u align="right" >  SUBTOTAL:</u> <strong align="right" ><?php echo number_format(($orden['Orden']['subtotal']), 3, '.', ''); ?> </strong>
                    </div>
                    <div class="col col-sm-1" align="right" >
                        
                      <u> IVA 16%:</u> <strong> <?php echo number_format(($orden['Orden']['iva']), 3, '.', ''); ?></strong>
                    </div>

                    <div class="col col-sm-1" align="right" >
                      <u align="right" >   TOTAL:</u> <strong align="right" ><?php echo number_format(($orden['Orden']['total']), 3, '.', ''); ?> </strong></h5>
                        
                    </div>
                
            
                
            </td>
        </tr>
    </table>
    <br>
<?php if (!empty($orden['OrdenItem'])): ?>
    <table  class="table table-striped border text-center">
        <thead>
        <tr>
                <th><u><?php echo ('COD PROD'); ?></u></th>
                <th><u><?php echo ('ARTICULO'); ?></u></th>
                
                <th><u><?php echo ('CANTIDAD'); ?> </u></th>
                <th><u><?php echo ('PRECIO'); ?></u></th>
                <td></td>
                <th><u><?php echo ('SUBOTAL'); ?></u></th>
        </tr>
        </thead>
        <tbody>

       <?php foreach ($orden['OrdenItem'] as $ordenitems): ?>
        
        <tr align="CENTER">
            <td><?php echo $ordenitems['Bodegaped']['CODIGO']; ?></td>
            <td><?php echo $ordenitems['Bodegaped']['DESCRIPCION']; ?></td>
        
            <td>
               <?php echo $ordenitems['cantidad']; ?>
            </td>

            <td>$<?php echo number_format($ordenitems['preciodesc'], 3, '.', ''); ?></td>
            <td></td>
           <td>$<?php echo number_format($ordenitems['subtotal'], 3, '.', ''); ?></td>

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
<TBODY>

<TR><TD><?php echo h($orden['Orden']['comentario']); ?>
<TD align="right">

    <strong>SUBTOTAL: $ <?php echo number_format(($orden['Orden']['subtotal']), 3, '.', ''); ?><strong>
        <br>  IVA 16%: <strong> $<?php echo number_format(($orden['Orden']['iva']), 3, '.', ''); ?></strong>
        <br>_________________
        <br>TOTAL:  $  <?php echo number_format(($orden['Orden']['total']), 3, '.', ''); ?>

</TR>


</TABLE>



   



       
    </body>
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

