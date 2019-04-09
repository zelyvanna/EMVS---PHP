<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tblparametre->parId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tblparametre->parId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tblparametre'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tblparametre form large-9 medium-8 columns content">
    <?= $this->Form->create($tblparametre) ?>
    <fieldset>
        <legend><?= __('Edit Tblparametre') ?></legend>
        <?php
            echo $this->Form->input('parNom');
            echo $this->Form->input('parValeur');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
