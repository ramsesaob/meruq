
<div class="ordens index3">
<strong>PROGESO DEL PEDIDO TERMINADO</strong>
    <div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
</div>
 <table class="table table-bordered table-hover text-center success">
  
    <tr class="success">
        <td> <h2><strong><?php echo __('"FELICIDADES TU PEDIDO HA SIDO CARGADO CON EXITO"'); ?></strong></h2>
         
    </TR>
    </table>
    <table class="table table-bordered table-hover text-center">
   <TR>
        <td class="col-sm-4 "> <h4><strong><H4><li><?php echo $this->Html->link(__('CARGAR OTRO PEDIDO'), array('controller' => 'pages', 'action' => 'home')); ?> </li>
            &nbsp; </strong></h4></td>
    </TR>
    <TR>
        <td class="col-sm-4 "> <h4><strong><H4><li><?php echo $this->Html->link(__('VER MIS PEDIDOS'), array('controller' => 'ordens', 'action' => 'index')); ?> </li>
            &nbsp; </strong></h4></td>
    
</TR>

</table>
    </dl>
</dd>

</td>
</thead>
</table> 
                         