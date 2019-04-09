<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tblprofesseur'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tblprofesseur index large-9 medium-8 columns content">
    <h3><?= __('Tblprofesseur') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('proId') ?></th>
                <th><?= $this->Paginator->sort('proNom') ?></th>
                <th><?= $this->Paginator->sort('proPrenom') ?></th>
                <th><?= $this->Paginator->sort('proMail') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tblprofesseur as $tblprofesseur): ?>
            <tr>
                <td><?= $this->Number->format($tblprofesseur->proId) ?></td>
                <td><?= h($tblprofesseur->proNom) ?></td>
                <td><?= h($tblprofesseur->proPrenom) ?></td>
                <td><?= h($tblprofesseur->proMail) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tblprofesseur->proId]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tblprofesseur->proId]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tblprofesseur->proId], ['confirm' => __('Are you sure you want to delete # {0}?', $tblprofesseur->proId)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
