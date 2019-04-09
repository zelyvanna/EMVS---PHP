<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblevaluation->evaId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblevaluation->evaId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tblevaluation'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblevaluation form large-9 medium-8 columns content">
    <?= $this->Form->create($tblevaluation) ?>
    <fieldset>
        <legend><?= __('Edit Tblevaluation') ?></legend>
        <?php
            echo $this->Form->input('tblQuestionnaire_qstId');
            echo $this->Form->input('tblSection_secId');
            echo $this->Form->input('tblProfesseur_proId');
            echo $this->Form->input('tblStatut_statId');
            echo $this->Form->input('evaNom');
            echo $this->Form->input('evaDebutValidite');
            echo $this->Form->input('evaFinValidite');
            echo $this->Form->input('evaCodeAccesParticipant');
            echo $this->Form->input('evaCodeAccesSynthese');
            echo $this->Form->input('evaClasse');
            echo $this->Form->input('evaModule');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
