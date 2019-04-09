<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblparametre'), ['action' => 'edit', $tblparametre->parId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblparametre'), ['action' => 'delete', $tblparametre->parId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblparametre->parId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblparametre'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblparametre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblparametre view large-9 medium-8 columns content">
    <h3><?= h($tblparametre->parId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ParNom') ?></th>
            <td><?= h($tblparametre->parNom) ?></td>
        </tr>
        <tr>
            <th><?= __('ParValeur') ?></th>
            <td><?= h($tblparametre->parValeur) ?></td>
        </tr>
        <tr>
            <th><?= __('ParId') ?></th>
            <td><?= $this->Number->format($tblparametre->parId) ?></td>
        </tr>
    </table>
</div>
