<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblevaluation'), ['action' => 'edit', $tblevaluation->evaId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblevaluation'), ['action' => 'delete', $tblevaluation->evaId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblevaluation->evaId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblevaluation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblevaluation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblevaluation view large-9 medium-8 columns content">
    <h3><?= h($tblevaluation->evaId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('EvaNom') ?></th>
            <td><?= h($tblevaluation->evaNom) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaCodeAccesParticipant') ?></th>
            <td><?= h($tblevaluation->evaCodeAccesParticipant) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaCodeAccesSynthese') ?></th>
            <td><?= h($tblevaluation->evaCodeAccesSynthese) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaClasse') ?></th>
            <td><?= h($tblevaluation->evaClasse) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaModule') ?></th>
            <td><?= h($tblevaluation->evaModule) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaId') ?></th>
            <td><?= $this->Number->format($tblevaluation->evaId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblQuestionnaire QstId') ?></th>
            <td><?= $this->Number->format($tblevaluation->tblQuestionnaire_qstId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblSection SecId') ?></th>
            <td><?= $this->Number->format($tblevaluation->tblSection_secId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblProfesseur ProId') ?></th>
            <td><?= $this->Number->format($tblevaluation->tblProfesseur_proId) ?></td>
        </tr>
        <tr>
            <th><?= __('TblStatut StatId') ?></th>
            <td><?= $this->Number->format($tblevaluation->tblStatut_statId) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaDebutValidite') ?></th>
            <td><?= h($tblevaluation->evaDebutValidite) ?></td>
        </tr>
        <tr>
            <th><?= __('EvaFinValidite') ?></th>
            <td><?= h($tblevaluation->evaFinValidite) ?></td>
        </tr>
    </table>
</div>
