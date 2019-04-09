<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblgroupe'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblgroupe index large-9 medium-8 columns content">
    <h3><?= __('Tblgroupe') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('groId') ?></th>
                <th><?= $this->Paginator->sort('groNom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblgroupe as $tblgroupe): ?>
            <tr>
                <td><?= $this->Number->format($tblgroupe->groId) ?></td>
                <td><?= h($tblgroupe->groNom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblgroupe->groId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblgroupe->groId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblgroupe->groId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblgroupe->groId)]) ?>
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
