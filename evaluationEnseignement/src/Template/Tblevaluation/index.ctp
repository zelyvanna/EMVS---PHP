<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblevaluation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblevaluation index large-9 medium-8 columns content">
    <h3><?= __('Tblevaluation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('evaId') ?></th>
                <th><?= $this->Paginator->sort('tblQuestionnaire_qstId') ?></th>
                <th><?= $this->Paginator->sort('tblSection_secId') ?></th>
                <th><?= $this->Paginator->sort('tblProfesseur_proId') ?></th>
                <th><?= $this->Paginator->sort('tblStatut_statId') ?></th>
                <th><?= $this->Paginator->sort('evaNom') ?></th>
                <th><?= $this->Paginator->sort('evaDebutValidite') ?></th>
                <th><?= $this->Paginator->sort('evaFinValidite') ?></th>
                <th><?= $this->Paginator->sort('evaCodeAccesParticipant') ?></th>
                <th><?= $this->Paginator->sort('evaCodeAccesSynthese') ?></th>
                <th><?= $this->Paginator->sort('evaClasse') ?></th>
                <th><?= $this->Paginator->sort('evaModule') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblevaluation as $tblevaluation): ?>
            <tr>
                <td><?= $this->Number->format($tblevaluation->evaId) ?></td>
                <td><?= $this->Number->format($tblevaluation->tblQuestionnaire_qstId) ?></td>
                <td><?= $this->Number->format($tblevaluation->tblSection_secId) ?></td>
                <td><?= $this->Number->format($tblevaluation->tblProfesseur_proId) ?></td>
                <td><?= $this->Number->format($tblevaluation->tblStatut_statId) ?></td>
                <td><?= h($tblevaluation->evaNom) ?></td>
                <td><?= h($tblevaluation->evaDebutValidite) ?></td>
                <td><?= h($tblevaluation->evaFinValidite) ?></td>
                <td><?= h($tblevaluation->evaCodeAccesParticipant) ?></td>
                <td><?= h($tblevaluation->evaCodeAccesSynthese) ?></td>
                <td><?= h($tblevaluation->evaClasse) ?></td>
                <td><?= h($tblevaluation->evaModule) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblevaluation->evaId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblevaluation->evaId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblevaluation->evaId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblevaluation->evaId)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
