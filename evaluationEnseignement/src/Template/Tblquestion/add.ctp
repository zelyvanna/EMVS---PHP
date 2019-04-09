<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblquestion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblquestion form large-9 medium-8 columns content">
    <?= $this->Form->create($tblquestion) ?>
    <fieldset>
        <legend><?= __('Add Tblquestion') ?></legend>
        <?php
            echo $this->Form->input('tblGroupe_groId');
            echo $this->Form->input('tblTypeQuestion_typId');
            echo $this->Form->input('quesLibelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
