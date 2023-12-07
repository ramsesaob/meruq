<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodega
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bodega->ARTICULO],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bodega->ARTICULO)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bodegas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bodegas form large-9 medium-8 columns content">
    <?= $this->Form->create($bodega) ?>
    <fieldset>
        <legend><?= __('Edit Bodega') ?></legend>
        <?php
            echo $this->Form->control('EXISTENCIA');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
