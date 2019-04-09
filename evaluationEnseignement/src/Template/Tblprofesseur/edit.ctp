<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblprofesseur->proId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblprofesseur->proId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tblprofesseur'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblprofesseur form large-9 medium-8 columns content">
    <?= $this->Form->create($tblprofesseur) ?>
    <fieldset>
        <legend><?= __('Edit Tblprofesseur') ?></legend>
        <?php
            echo $this->Form->input('proNom');
            echo $this->Form->input('proPrenom');
            echo $this->Form->input('proMail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
