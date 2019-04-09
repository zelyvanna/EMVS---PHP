<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblgroupe'), ['action' => 'edit', $tblgroupe->groId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblgroupe'), ['action' => 'delete', $tblgroupe->groId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblgroupe->groId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblgroupe'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblgroupe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblgroupe view large-9 medium-8 columns content">
    <h3><?= h($tblgroupe->groId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('GroNom') ?></th>
            <td><?= h($tblgroupe->groNom) ?></td>
        </tr>
        <tr>
            <th><?= __('GroId') ?></th>
            <td><?= $this->Number->format($tblgroupe->groId) ?></td>
        </tr>
    </table>
</div>
