<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblparticipation'), ['action' => 'edit', $tblparticipation->partId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblparticipation'), ['action' => 'delete', $tblparticipation->partId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblparticipation->partId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblparticipation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblparticipation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblparticipation view large-9 medium-8 columns content">
    <h3><?= h($tblparticipation->partId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('PartContact') ?></th>
            <td><?= h($tblparticipation->partContact) ?></td>
        </tr>
        <tr>
            <th><?= __('PartId') ?></th>
            <td><?= $this->Number->format($tblparticipation->partId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblEvaluation EvaId') ?></th>
            <td><?= $this->Number->format($tblparticipation->tblEvaluation_evaId) ?></td>
        </tr>
        <tr>
            <th><?= __('PartDate') ?></th>
            <td><?= h($tblparticipation->partDate) ?></td>
        </tr>
    </table>
</div>
