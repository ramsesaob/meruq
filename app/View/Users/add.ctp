<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User'); ?>
			<form>
				
				<legend><b><?php echo __('Ingresar Nuevo Usuario'); ?></b></legend>



			 
		</div>
	</div>
</div>
		 
		<table class="table table-bordered text-center">
     <thead>
	<thead>
	
		<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Nombre de Usuario', 'placeholder' => 'Escriba el Nombre de Usuario aqui...'));?>
  <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Contraseña', 'maxLength' => 255, 'placeholder' => 'Escriba la Contraseña aqui...'));?>
  <?php echo $this->Form->input('password_confirm', array('class' => 'form-control', 'label' => 'Confirmar contraseña', 'maxLength' => 255, 'title' => 'Confirmar contraseña', 'type'=>'password','placeholder' => 'Confirmar Contraseña aqui...'));?>
  	<?php echo $this->Form->input('role', array('class' => 'form-control', 'empty' => '(seleccione)',
					                        'type' => 'select',
					                         'label'=>array('text' => 'Rol'),
					                            'options' => array(
					                                 
					                                  'admin' => 'admin',
					                                   'user1' => 'vendedor',
					                                   //'user2' => 'user',
					                                  // 'user3' => 'user ',
					                                  // 'user4' => 'user',
					                                 //  'user5' => 'user',
					                                  // 'user6' => 'user',

					                                  ),)); ?> 
					                                  	<?php
	
				   echo $this->Form->input('status', array('type' => 'hidden', 'value' => 1));                          		
							echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'Indicar los Nombre', 'placeholder' => 'Escriba el Nombre aqui...'));
							echo $this->Form->input('vendedor', array('class' => 'form-control', 'label' => 'Indicar el Vendedor', 'placeholder' => 'Escriba Vendedor aqui...'));
							
								echo $this->Form->input('telefonovend', array('class' => 'form-control', 'label' => 'Indicar el Nùmero de Telefono', 'placeholder' => 'Escriba el Nùmero de Telefono aqui...'));

								echo $this->Form->input('userbod', array('class' => 'form-control', 'empty' => '(seleccione)',
					                        'type' => 'select',
					                        'multiple'=>'checkbox',
					                         'label'=>array('text' => 'Bodega Asignada'),
					                            'options' => array(
					                                 
					                                  '1' => '1',
					                                   '2' => '2',
					                                   '3' => '3',
					                                  '4' => '4 ',
					                                   '5' => '5',
					                                   '6' => '6',
					                                   '7' => '7',
					                                   '8' => '8',
					                                   '9' => '9',
					                                   '10' => '10',
					                                  '11' => '11 ',
					                                   '12' => '12',
					                                   '13' => '13',
					                                   '14' => '14',
					                                   '15' => '15',
					                                   '16' => '16',
					                                   '17' => '17',
					                                  '18' => '18 ',
					                                   '19' => '19',
					                                   '20' => '20',
					                                   '21' => '21',
					                                   '22' => '22',
					                                   '23' => '23',
					                                   '24' => '24',
					                                  '25' => '25 ',
					                                   '26' => '26',
					                                   '27' => '27',
					                                   '28' => '28',
					                                   '29' => '29',
					                                   '30' => '30',
					                                   '31' => '31',
					                                  '32' => '32 ',
					                                   '33' => '33',
					                                   '34' => '34',
					                                   '35' => '35',
					                                   '36' => '36',
					                                   '37' => '37',
					                                   '38' => '38',
					                                  '39' => '39 ',
					                                   '40' => '40',
					                                   '41' => '41',
					                                   '42' => '42',
					                                   '43' => '43',
					                                   '44' => '44',
					                                   '45' => '45',
					                                  '46' => '46 ',
					                                   '47' => '47',
					                                   '48' => '48',
					                                   '49' => '49',
					                                   '50' => '50',
					                                   '51' => '51',
					                                   '52' => '52',
					                                  '53' => '53 ',
					                                   '54' => '54',
					                                   '55' => '55',
					                                   '56' => '56',


					                                  ))); 

					                                  ?> 
					                                  	
	</td>
 </td>
 </table>

<table width= 30% align="center">
  <thead> 
    <tr>
<td><p></p><?php echo $this->Form->submit('Registrar', array('div' => 'form-group', 'class' => 'btn btn-primary'));?></td>
<td><p><?php echo $this->Form->button('Borrar', array('type'=>'reset' ,'class' => 'btn btn-primary'));?>  <?php echo $this->Form->end(); ?></p></td>

</tr>
</thead>
</table>
</form>