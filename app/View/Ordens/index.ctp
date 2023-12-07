<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
                margin-top: 0.0cm;
                margin-left:0.0cm;
                margin-right: 0.0cm;
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
     		
                margin-left: 0.1cm;
                margin-right: 0.1cm;
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
</head>
<body>


<?php
//debug($ordens);
?>

<?php echo $this->Html->script( array('app.js'), array('inline' => false) ); ?>  


<?php if(empty($ordens)): ?>

<h2>No existen ordenes disponibles</h2>

<?php else: ?>

	

	<div class="ordens form">

	<div class="col-md-12">
			<h2><?php echo __('MIS PEDIDOS'); ?></h2>
	
	
			<table id="tabla" class="table table-striped text-center">
		
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Nº DE PEDIDO'); ?></th>
				<th><?php echo $this->Paginator->sort('Cliente'); ?></th>
				<th><?php echo $this->Paginator->sort('Total'); ?></th>
				<th><?php echo $this->Paginator->sort('Creado'); ?></th>
				<th class="actions"><?php echo __('Ver'); ?></th>
				<th><?php echo $this->Paginator->sort('DOC'); ?></th>
			
		</tr>
		</thead>
		<input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
		<tbody>

        <?php foreach($ordens as $orden): ?>
		
		<tr class="light">
			<td><?php echo h($orden['Orden']['numpedido']); ?></td>
			<td><?php echo h($orden['Cliente']['DESCRIPCION']); ?></td>
		
			<td>
				<?php echo number_format($orden['Orden']['total'], 2, '.', ''); ?>$
			</td>

			<td><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['created'])); ?></td>
			
			<td class="actions">
				
				<?php 
				    echo $this->Html->link('', array('controller' => 'ordens', 'action' => 'view', $orden['Orden']['id']), array('class' => 'glyphicon glyphicon-search'));
				?>
				<!--<?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>',  array('action' => 'edit', $orden['Orden']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?>-->

               
			</td>
			<td>
				<?php 
			if(!empty($orden['Orden']['tipo_doc'])) {
				echo '<i class="btn btn-success btn-circle glyphicon glyphicon-ok"></i>';
			} else { 
				echo '<i class="btn btn-danger btn-circle glyphicon glyphicon-remove"></i>';
			} ?>
			</td>
		</tr>
        <?php endforeach; ?>
		
		</tbody>
		</table>

	</div>

		<p>
		 <?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, muestra {:current} de un total de {:count}, comienza en el registro {:start} y finaliza en el registro {:end}')));?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->

<?php endif; ?>
<script type="text/javascript">
     var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);
</script>
</body>
</html>