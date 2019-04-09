<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tblprofesseur'), ['action' => 'edit', $tblprofesseur->proId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tblprofesseur'), ['action' => 'delete', $tblprofesseur->proId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblprofesseur->proId)]) ?> </li>
        <li><?= $this->Html->link(__('List Tblprofesseur'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tblprofesseur'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tblprofesseur view large-9 medium-8 columns content">
    <h3><?= h($tblprofesseur->proId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ProNom') ?></th>
            <td><?= h($tblprofesseur->proNom) ?></td>
        </tr>
        <tr>
            <th><?= __('ProPrenom') ?></th>
            <td><?= h($tblprofesseur->proPrenom) ?></td>
        </tr>
        <tr>
            <th><?= __('ProMail') ?></th>
            <td><?= h($tblprofesseur->proMail) ?></td>
        </tr>
        <tr>
            <th><?= __('ProId') ?></th>
            <td><?= $this->Number->format($tblprofesseur->proId) ?></td>
        </tr>
    </table>
</div>
