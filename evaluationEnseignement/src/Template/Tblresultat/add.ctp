<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tblresultat'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblresultat form large-9 medium-8 columns content">
    <?= $this->Form->create($tblresultat) ?>
    <fieldset>
        <legend><?= __('Add Tblresultat') ?></legend>
        <?php
            echo $this->Form->input('tblReponse_repId');
            echo $this->Form->input('tblQuestion_quesId');
            echo $this->Form->input('tblParticipation_partId');
            echo $this->Form->input('resCommentaire');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
