<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblstatut'), ['action' => 'edit', $tblstatut->statId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblstatut'), ['action' => 'delete', $tblstatut->statId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblstatut->statId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblstatut'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblstatut'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblstatut view large-9 medium-8 columns content">
    <h3><?= h($tblstatut->statId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('StatNom') ?></th>
            <td><?= h($tblstatut->statNom) ?></td>
        </tr>
        <tr>
            <th><?= __('StatId') ?></th>
            <td><?= $this->Number->format($tblstatut->statId) ?></td>
        </tr>
    </table>
</div>
