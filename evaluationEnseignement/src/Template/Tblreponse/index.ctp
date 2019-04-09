<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblreponse'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblreponse index large-9 medium-8 columns content">
    <h3><?= __('Tblreponse') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('repId') ?></th>
                <th><?= $this->Paginator->sort('repLibelle') ?></th>
                <th><?= $this->Paginator->sort('repPonderation') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblreponse as $tblreponse): ?>
            <tr>
                <td><?= $this->Number->format($tblreponse->repId) ?></td>
                <td><?= h($tblreponse->repLibelle) ?></td>
                <td><?= $this->Number->format($tblreponse->repPonderation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblreponse->repId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblreponse->repId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblreponse->repId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblreponse->repId)]) ?>
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
