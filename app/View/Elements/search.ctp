php
<h2>Resultados de la búsqueda</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo $cliente['Cliente']['nombre']; ?></td>
            <td><?php echo $cliente['Cliente']['email']; ?></td>
            <td><?php echo $cliente['Cliente']['telefono']; ?></td>
            <td><?php echo $this->Html->link('Agregar', array('action' => 'add', $cliente['Cliente']['id'])); ?></td>
        </tr>
    <?php endforeach; ?>
</table>