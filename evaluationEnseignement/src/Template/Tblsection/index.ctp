<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblsection'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblsection index large-9 medium-8 columns content">
    <h3><?= __('Tblsection') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('secId') ?></th>
                <th><?= $this->Paginator->sort('secNom') ?></th>
                <th><?= $this->Paginator->sort('secAbrev') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblsection as $tblsection): ?>
            <tr>
                <td><?= $this->Number->format($tblsection->secId) ?></td>
                <td><?= h($tblsection->secNom) ?></td>
                <td><?= h($tblsection->secAbrev) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblsection->secId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblsection->secId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblsection->secId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblsection->secId)]) ?>
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
