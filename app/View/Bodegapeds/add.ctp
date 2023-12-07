<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodega $bodegaspeds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bodegas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bodegas form large-9 medium-8 columns content">
    <?= $this->Form->create($bodegaspeds) ?>
    <fieldset>
        <legend><?= __('Add Bodega') ?></legend>
        <?php
            echo $this->Form->control('EXISTENCIA');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
