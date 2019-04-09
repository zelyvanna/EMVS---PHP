<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tbllistequestion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tbllistequestion form large-9 medium-8 columns content">
    <?= $this->Form->create($tbllistequestion) ?>
    <fieldset>
        <legend><?= __('Add Tbllistequestion') ?></legend>
        <?php
            echo $this->Form->input('tblQuestion_quesId');
            echo $this->Form->input('tblQuestionnaire_qstId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
