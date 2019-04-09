<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblstatut'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblstatut form large-9 medium-8 columns content">
    <?= $this->Form->create($tblstatut) ?>
    <fieldset>
        <legend><?= __('Add Tblstatut') ?></legend>
        <?php
            echo $this->Form->input('statNom');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
