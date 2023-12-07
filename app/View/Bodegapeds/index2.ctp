 <?php
        debug($valor);
            ?>

php
<h1>Valores mayores a cero:</h1>
<ul>
   <?php foreach ($valores as $valor): ?>
      <li><?php echo $valor; ?></li>
   <?php endforeach; ?>
</ul>