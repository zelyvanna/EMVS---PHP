<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblquestion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblquestion index large-9 medium-8 columns content">
    <h3><?= __('Tblquestion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('quesId') ?></th>
                <th><?= $this->Paginator->sort('tblGroupe_groId') ?></th>
                <th><?= $this->Paginator->sort('tblTypeQuestion_typId') ?></th>
                <th><?= $this->Paginator->sort('quesLibelle') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblquestion as $tblquestion): ?>
            <tr>
                <td><?= $this->Number->format($tblquestion->quesId) ?></td>
                <td><?= $this->Number->format($tblquestion->tblGroupe_groId) ?></td>
                <td><?= $this->Number->format($tblquestion->tblTypeQuestion_typId) ?></td>
                <td><?= h($tblquestion->quesLibelle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblquestion->quesId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblquestion->quesId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblquestion->quesId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblquestion->quesId)]) ?>
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
