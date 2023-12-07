<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-6">

			<?php echo $this->Form->create('Reciboped', array('type' => 'file',  'novalidate' => 'novalidate')); ?>
				<fieldset>
					<legend><?php echo __('Nuevo Recibo'); ?></legend>
				
				<?php
				 					
									echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Vendedor'));
									echo $this->Form->input('id');
				 					echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Cargar Foto', 'id' => 'foto', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true' ));
							   		  echo $this->Form->input('foto_dir', array('type' => 'hidden'));
									echo $this->Form->input('cliente_id', array(
									    'class' => 'select selectpicker form-control ',
									   'value' => ['cliente_id'],
									  //  'value' => 'cliente_id',
									    'data-live-search' => true,
									    'data-tokens' => 'cliente_id',
									    'label' => 'Seleccione el Cliente',
									    'empty' => '(seleccione)',
									    'data-placeholder' => 'Buscar cliente',
									    'id' => 'cliente_id',
									    'order' => array('Cliente.DESCRIPCION' => 'asc'),
									    //'data-id' => ['Orden']['cliente_id']
									    
									));
									
									echo $this->Form->input('monto', array('class' => 'form-control', 'label' => 'Ingese el monto recibido'));
									echo $this->Form->input('comentario', array('class' => 'form-control', 'label' => 'Comentario'));
									

									 
				?>
				</fieldset>
				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Recibo', 'class' =>'btn btn-success')); ?>
				</p>
			
		</div>
	</div>
</div>