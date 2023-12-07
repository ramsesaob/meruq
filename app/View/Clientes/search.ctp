<?php echo $this->Html->script(array('addtocart3.js'), array('inline' => false)); ?>






<!DOCTYPE html>
<html>
 <head>
  
<script src="
https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css
" rel="stylesheet">
  
 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
 
   <br />
   <div class="col-md-4" style="margin-left:200px;">
 
     <select >
      <?php
        echo $this->Form->input('cliente_id', array(
    'class' => 'form-control',
    'label' => 'Seleccione el Cliente',
    'empty' => '(seleccione)',
    'data-placeholder' => 'Buscar cliente',
    'data-minimum-input-length' => 3, // Número mínimo de caracteres antes de realizar la búsqueda
    'data-ajax--url' => basePath + (array('controller' => 'clientes', 'action' => 'search')), // Ruta a la acción de búsqueda en tu controlador de clientes
    'data-ajax--cache' => 'true' // Opcional: si quieres habilitar el caché de resultados
));
?>
  
     </select>
     <br /><br />
 
    </form>
    <br />
    
   </div>
  </div>
 </body>
</html>


<?php
echo $this->Form->input('DESCRIPCION', array(
    'class' => 'form-control',
    'label' => 'Seleccione el Cliente',
    'empty' => '(seleccione)',
    'data-placeholder' => 'Buscar cliente',
    'data-minimum-input-length' => 3, // Número mínimo de caracteres antes de realizar la búsqueda
    'data-ajax--url' => 'basePath + "clientes/search"', // Ruta a la acción de búsqueda en tu controlador de clientes
    'data-ajax--cache' => 'true' // Opcional: si quieres habilitar el caché de resultados
));
?>




  ..  <?php
echo $this->Form->input('cliente_id', array(
    'class' => 'form-control selectpicker',
    'label' => 'Seleccione el Cliente',
    'empty' => '(seleccione)',
    'data-placeholder' => 'Buscar cliente',
    'data-minimum-input-length' => 3, // Número mínimo de caracteres antes de realizar la búsqueda
    'data-ajax--url' => 'basePath' + 'ordens/search', // Ruta a la acción de búsqueda en tu controlador de clientes
    'data-ajax--cache' => 'true' // Opcional: si quieres habilitar el caché de resultados
));
?>
 