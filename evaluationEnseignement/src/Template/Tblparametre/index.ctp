<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblparametre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblparametre index large-9 medium-8 columns content">
    <h3><?= __('Tblparametre') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('parId') ?></th>
                <th><?= $this->Paginator->sort('parNom') ?></th>
                <th><?= $this->Paginator->sort('parValeur') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblparametre as $tblparametre): ?>
            <tr>
                <td><?= $this->Number->format($tblparametre->parId) ?></td>
                <td><?= h($tblparametre->parNom) ?></td>
                <td><?= h($tblparametre->parValeur) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblparametre->parId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblparametre->parId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblparametre->parId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblparametre->parId)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
