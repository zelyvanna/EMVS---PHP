<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblsection'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblsection form large-9 medium-8 columns content">
    <?= $this->Form->create($tblsection) ?>
    <fieldset>
        <legend><?= __('Add Tblsection') ?></legend>
        <?php
            echo $this->Form->input('secNom');
            echo $this->Form->input('secAbrev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
