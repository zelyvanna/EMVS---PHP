<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblquestionnaire'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblquestionnaire form large-9 medium-8 columns content">
    <?= $this->Form->create($tblquestionnaire) ?>
    <fieldset>
        <legend><?= __('Add Tblquestionnaire') ?></legend>
        <?php
            echo $this->Form->input('qstNom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
