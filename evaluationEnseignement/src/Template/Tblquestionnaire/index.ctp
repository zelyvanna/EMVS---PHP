<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblquestionnaire'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblquestionnaire index large-9 medium-8 columns content">
    <h3><?= __('Tblquestionnaire') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('qstId') ?></th>
                <th><?= $this->Paginator->sort('qstNom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblquestionnaire as $tblquestionnaire): ?>
            <tr>
                <td><?= $this->Number->format($tblquestionnaire->qstId) ?></td>
                <td><?= h($tblquestionnaire->qstNom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblquestionnaire->qstId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblquestionnaire->qstId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblquestionnaire->qstId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblquestionnaire->qstId)]) ?>
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
