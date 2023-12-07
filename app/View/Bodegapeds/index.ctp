<?php
//debug($bodegapeds);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodegasped[]|\Cake\Collection\CollectionInterface $bodegas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bodegasped'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bodegas index large-9 medium-8 columns content">
    <h3><?= __('Bodegas') ?></h3>
    <table table-striped cellpadding="2" cellspacing="2" >
        <thead>
            <tr>
                 <th scope="col col-sm-1"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col col-sm-1"><?= $this->Paginator->sort('ARTICULO') ?></th>
                <th scope="col col-sm-1"><?= $this->Paginator->sort('BODEGA') ?></th>
                <th scope="col col-sm-1"><?= $this->Paginator->sort('EXISTENCIA') ?></th>
                <th scope="col col-sm-1" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bodegapeds as $bodegaped): ?>
            <tr>
                 <td><?php echo $bodegaped['Bodegaped']['id']; ?>
                   
                <td>
                      <?php echo $this->Html->link($bodegaped['Articulo']['DESCRIPCION'], array('controller' => 'articulos', 'action' => 'view', $bodegaped['Bodegaped']['articulo_id'])); ?>
                 </td>
                </td>
                <td>
                  <?php echo $bodegaped['Bodegaped']['BODEGA']; ?>
                </td>
                <td> <?php echo $bodegaped['Bodegaped']['EXISTENCIA']; ?></td>
                <td class="actions">
                  
                    <?php echo $this->Html->link('Ver Datos',  array('action' => 'view', $bodegaped['Bodegaped']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'ver')); ?>
                    <?php echo $this->Html->link('Editar',  array('action' => 'edit', $bodegaped['Bodegaped']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'ver')); ?>
                    <?php echo $this->Form->postLink('Eliminar', array('action' => 'delete', $bodegaped['Bodegaped']['id']), array('confirm' => __('Esta seguro que desea borrar este Usuario?', $bodegaped['Bodegaped']['id']), 'class'    => 'tip', 'escape'   => false, 'title' => 'borrar')); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
