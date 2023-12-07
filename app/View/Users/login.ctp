<div>
  
<table align="center">
  <tr>
<?php

echo $this->Session->flash('auth');
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
echo $this->Form->input('username', array('class' => 'form-control2', 'label' => '', 'placeholder' => ' Nombre de Usuario...'));
echo $this->Form->input('password', array('class' => 'form-control2', 'label' => '', 'placeholder' => 'Contraseña ...'));

?>
<?php echo $this->Form->button('Ingresar' );?>

</tr>
</table>




      <hr>

      <footer>
        <p>&copy; PEDIDOS MERUQ</p>
      </footer>
    </div> <!-- /container -->
