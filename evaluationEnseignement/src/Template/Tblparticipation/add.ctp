<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblparticipation'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblparticipation form large-9 medium-8 columns content">
    <?= $this->Form->create($tblparticipation) ?>
    <fieldset>
        <legend><?= __('Add Tblparticipation') ?></legend>
        <?php
            echo $this->Form->input('tblEvaluation_evaId');
            echo $this->Form->input('partContact');
            echo $this->Form->input('partDate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
