<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblgroupe'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblgroupe form large-9 medium-8 columns content">
    <?= $this->Form->create($tblgroupe) ?>
    <fieldset>
        <legend><?= __('Add Tblgroupe') ?></legend>
        <?php
            echo $this->Form->input('groNom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
