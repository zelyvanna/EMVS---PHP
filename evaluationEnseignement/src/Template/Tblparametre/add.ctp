<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblparametre'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblparametre form large-9 medium-8 columns content">
    <?= $this->Form->create($tblparametre) ?>
    <fieldset>
        <legend><?= __('Add Tblparametre') ?></legend>
        <?php
            echo $this->Form->input('parNom');
            echo $this->Form->input('parValeur');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
