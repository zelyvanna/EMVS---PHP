<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblquestion'), ['action' => 'edit', $tblquestion->quesId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblquestion'), ['action' => 'delete', $tblquestion->quesId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblquestion->quesId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblquestion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblquestion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblquestion view large-9 medium-8 columns content">
    <h3><?= h($tblquestion->quesId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('QuesLibelle') ?></th>
            <td><?= h($tblquestion->quesLibelle) ?></td>
        </tr>
        <tr>
            <th><?= __('QuesId') ?></th>
            <td><?= $this->Number->format($tblquestion->quesId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblGroupe GroId') ?></th>
            <td><?= $this->Number->format($tblquestion->tblGroupe_groId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblTypeQuestion TypId') ?></th>
            <td><?= $this->Number->format($tblquestion->tblTypeQuestion_typId) ?></td>
        </tr>
    </table>
</div>
