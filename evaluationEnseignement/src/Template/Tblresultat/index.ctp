<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblresultat'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblresultat index large-9 medium-8 columns content">
    <h3><?= __('Tblresultat') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('resId') ?></th>
                <th><?= $this->Paginator->sort('tblReponse_repId') ?></th>
                <th><?= $this->Paginator->sort('tblQuestion_quesId') ?></th>
                <th><?= $this->Paginator->sort('tblParticipation_partId') ?></th>
                <th><?= $this->Paginator->sort('resCommentaire') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblresultat as $tblresultat): ?>
            <tr>
                <td><?= $this->Number->format($tblresultat->resId) ?></td>
                <td><?= $this->Number->format($tblresultat->tblReponse_repId) ?></td>
                <td><?= $this->Number->format($tblresultat->tblQuestion_quesId) ?></td>
                <td><?= $this->Number->format($tblresultat->tblParticipation_partId) ?></td>
                <td><?= h($tblresultat->resCommentaire) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblresultat->resId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblresultat->resId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblresultat->resId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblresultat->resId)]) ?>
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
