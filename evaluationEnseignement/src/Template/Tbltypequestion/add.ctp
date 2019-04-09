<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tbltypequestion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tbltypequestion form large-9 medium-8 columns content">
    <?= $this->Form->create($tbltypequestion) ?>
    <fieldset>
        <legend><?= __('Add Tbltypequestion') ?></legend>
        <?php
            echo $this->Form->input('typNom');
            echo $this->Form->input('typAbrev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
