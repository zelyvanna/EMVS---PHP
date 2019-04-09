<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblsection->secId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblsection->secId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tblsection'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblsection form large-9 medium-8 columns content">
    <?= $this->Form->create($tblsection) ?>
    <fieldset>
        <legend><?= __('Edit Tblsection') ?></legend>
        <?php
            echo $this->Form->input('secNom');
            echo $this->Form->input('secAbrev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
