<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblparticipation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblparticipation index large-9 medium-8 columns content">
    <h3><?= __('Tblparticipation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('partId') ?></th>
                <th><?= $this->Paginator->sort('tblEvaluation_evaId') ?></th>
                <th><?= $this->Paginator->sort('partContact') ?></th>
                <th><?= $this->Paginator->sort('partDate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblparticipation as $tblparticipation): ?>
            <tr>
                <td><?= $this->Number->format($tblparticipation->partId) ?></td>
                <td><?= $this->Number->format($tblparticipation->tblEvaluation_evaId) ?></td>
                <td><?= h($tblparticipation->partContact) ?></td>
                <td><?= h($tblparticipation->partDate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblparticipation->partId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblparticipation->partId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblparticipation->partId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblparticipation->partId)]) ?>
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
