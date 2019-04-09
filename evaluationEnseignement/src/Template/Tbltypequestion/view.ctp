<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbltypequestion'), ['action' => 'edit', $tbltypequestion->typId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbltypequestion'), ['action' => 'delete', $tbltypequestion->typId], ['confirm' => __('Are you sure you want to delete # {0}?', $tbltypequestion->typId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbltypequestion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbltypequestion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbltypequestion view large-9 medium-8 columns content">
    <h3><?= h($tbltypequestion->typId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('TypNom') ?></th>
            <td><?= h($tbltypequestion->typNom) ?></td>
        </tr>
        <tr>
            <th><?= __('TypAbrev') ?></th>
            <td><?= h($tbltypequestion->typAbrev) ?></td>
        </tr>
        <tr>
            <th><?= __('TypId') ?></th>
            <td><?= $this->Number->format($tbltypequestion->typId) ?></td>
        </tr>
    </table>
</div>
