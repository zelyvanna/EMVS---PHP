<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbllistequestion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbllistequestion index large-9 medium-8 columns content">
    <h3><?= __('Tbllistequestion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('lstQuestion') ?></th>
                <th><?= $this->Paginator->sort('tblQuestion_quesId') ?></th>
                <th><?= $this->Paginator->sort('tblQuestionnaire_qstId') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbllistequestion as $tbllistequestion): ?>
            <tr>
                <td><?= $this->Number->format($tbllistequestion->lstQuestion) ?></td>
                <td><?= $this->Number->format($tbllistequestion->tblQuestion_quesId) ?></td>
                <td><?= $this->Number->format($tbllistequestion->tblQuestionnaire_qstId) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tbllistequestion->lstQuestion]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tbllistequestion->lstQuestion]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tbllistequestion->lstQuestion], ['confirm' => __('Are you sure you want to delete # {0}?', $tbllistequestion->lstQuestion)]) ?>
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
