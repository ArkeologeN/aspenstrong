<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AsConnection[]|\Cake\Collection\CollectionInterface $asConnections
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New As Connection'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="asConnections index large-9 medium-8 columns content">
    <h3><?= __('As Connections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('added_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('owner') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('program_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('health_fund_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latii') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asConnections as $asConnection): ?>
            <tr>
                <td><?= $this->Number->format($asConnection->id) ?></td>
                <td><?= h($asConnection->ts) ?></td>
                <td><?= h($asConnection->locations) ?></td>
                <td><?= $this->Number->format($asConnection->added_by) ?></td>
                <td><?= $this->Number->format($asConnection->edited_by) ?></td>
                <td><?= $this->Number->format($asConnection->owner) ?></td>
                <td><?= $this->Number->format($asConnection->user) ?></td>
                <td><?= h($asConnection->status) ?></td>
                <td><?= $this->Number->format($asConnection->verified_status) ?></td>
                <td><?= $this->Number->format($asConnection->program_status) ?></td>
                <td><?= $this->Number->format($asConnection->health_fund_status) ?></td>
                <td><?= h($asConnection->logo) ?></td>
                <td><?= h($asConnection->longi) ?></td>
                <td><?= h($asConnection->latii) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $asConnection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asConnection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asConnection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asConnection->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
