<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblreponse'), ['action' => 'edit', $tblreponse->repId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblreponse'), ['action' => 'delete', $tblreponse->repId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblreponse->repId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblreponse'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblreponse'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblreponse view large-9 medium-8 columns content">
    <h3><?= h($tblreponse->repId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('RepLibelle') ?></th>
            <td><?= h($tblreponse->repLibelle) ?></td>
        </tr>
        <tr>
            <th><?= __('RepId') ?></th>
            <td><?= $this->Number->format($tblreponse->repId) ?></td>
        </tr>
        <tr>
            <th><?= __('RepPonderation') ?></th>
            <td><?= $this->Number->format($tblreponse->repPonderation) ?></td>
        </tr>
    </table>
</div>
