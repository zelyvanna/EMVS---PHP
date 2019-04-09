<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblstatut'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblstatut index large-9 medium-8 columns content">
    <h3><?= __('Tblstatut') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('statId') ?></th>
                <th><?= $this->Paginator->sort('statNom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblstatut as $tblstatut): ?>
            <tr>
                <td><?= $this->Number->format($tblstatut->statId) ?></td>
                <td><?= h($tblstatut->statNom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblstatut->statId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblstatut->statId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblstatut->statId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblstatut->statId)]) ?>
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
