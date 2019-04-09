<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tbllistequestion'), ['action' => 'edit', $tbllistequestion->lstQuestion]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tbllistequestion'), ['action' => 'delete', $tbllistequestion->lstQuestion], ['confirm' => __('Are you sure you want to delete # {0}?', $tbllistequestion->lstQuestion)]) ?> </li>
        <li><?= $this->Html->link(__('List Tbllistequestion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tbllistequestion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbllistequestion view large-9 medium-8 columns content">
    <h3><?= h($tbllistequestion->lstQuestion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('LstQuestion') ?></th>
            <td><?= $this->Number->format($tbllistequestion->lstQuestion) ?></td>
        </tr>
        <tr>
            <th><?= __('TblQuestion QuesId') ?></th>
            <td><?= $this->Number->format($tbllistequestion->tblQuestion_quesId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblQuestionnaire QstId') ?></th>
            <td><?= $this->Number->format($tbllistequestion->tblQuestionnaire_qstId) ?></td>
        </tr>
    </table>
</div>
