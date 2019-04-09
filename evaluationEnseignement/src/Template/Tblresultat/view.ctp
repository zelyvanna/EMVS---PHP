<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblresultat'), ['action' => 'edit', $tblresultat->resId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblresultat'), ['action' => 'delete', $tblresultat->resId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblresultat->resId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblresultat'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblresultat'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblresultat view large-9 medium-8 columns content">
    <h3><?= h($tblresultat->resId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ResCommentaire') ?></th>
            <td><?= h($tblresultat->resCommentaire) ?></td>
        </tr>
        <tr>
            <th><?= __('ResId') ?></th>
            <td><?= $this->Number->format($tblresultat->resId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblReponse RepId') ?></th>
            <td><?= $this->Number->format($tblresultat->tblReponse_repId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblQuestion QuesId') ?></th>
            <td><?= $this->Number->format($tblresultat->tblQuestion_quesId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblParticipation PartId') ?></th>
            <td><?= $this->Number->format($tblresultat->tblParticipation_partId) ?></td>
        </tr>
    </table>
</div>
