<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tbltypequestion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbltypequestion index large-9 medium-8 columns content">
    <h3><?= __('Tbltypequestion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('typId') ?></th>
                <th><?= $this->Paginator->sort('typNom') ?></th>
                <th><?= $this->Paginator->sort('typAbrev') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbltypequestion as $tbltypequestion): ?>
            <tr>
                <td><?= $this->Number->format($tbltypequestion->typId) ?></td>
                <td><?= h($tbltypequestion->typNom) ?></td>
                <td><?= h($tbltypequestion->typAbrev) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tbltypequestion->typId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tbltypequestion->typId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tbltypequestion->typId], ['confirm' => __('Are you sure you want to delete # {0}?', $tbltypequestion->typId)]) ?>
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
