<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblsection'), ['action' => 'edit', $tblsection->secId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblsection'), ['action' => 'delete', $tblsection->secId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblsection->secId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblsection'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblsection'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblsection view large-9 medium-8 columns content">
    <h3><?= h($tblsection->secId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('SecNom') ?></th>
            <td><?= h($tblsection->secNom) ?></td>
        </tr>
        <tr>
            <th><?= __('SecAbrev') ?></th>
            <td><?= h($tblsection->secAbrev) ?></td>
        </tr>
        <tr>
            <th><?= __('SecId') ?></th>
            <td><?= $this->Number->format($tblsection->secId) ?></td>
        </tr>
    </table>
</div>
