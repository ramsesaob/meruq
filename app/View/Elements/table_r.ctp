<div id="totalajax">
    <table class='w3-table-all w3-hoverable' cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="sorter" scope="col"><?= $this->Paginator->sort('DESCRIPCION') ?></th>
                <th class="sorter" scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bodegas as $bodega): ?>
            <tr>
                <td><?php echo $bodega['Bodega']['DESCRIPCION']; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', ]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', ]) ?>
                   
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
    </div>
</div>