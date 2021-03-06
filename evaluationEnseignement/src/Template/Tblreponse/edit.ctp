<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblreponse->repId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblreponse->repId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tblreponse'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblreponse form large-9 medium-8 columns content">
    <?= $this->Form->create($tblreponse) ?>
    <fieldset>
        <legend><?= __('Edit Tblreponse') ?></legend>
        <?php
            echo $this->Form->input('repLibelle');
            echo $this->Form->input('repPonderation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
