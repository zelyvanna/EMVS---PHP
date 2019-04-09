<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblquestionnaire'), ['action' => 'edit', $tblquestionnaire->qstId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblquestionnaire'), ['action' => 'delete', $tblquestionnaire->qstId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblquestionnaire->qstId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblquestionnaire'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblquestionnaire'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblquestionnaire view large-9 medium-8 columns content">
    <h3><?= h($tblquestionnaire->qstId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('QstNom') ?></th>
            <td><?= h($tblquestionnaire->qstNom) ?></td>
        </tr>
        <tr>
            <th><?= __('QstId') ?></th>
            <td><?= $this->Number->format($tblquestionnaire->qstId) ?></td>
        </tr>
    </table>
</div>
