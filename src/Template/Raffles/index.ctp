<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Raffle[]|\Cake\Collection\CollectionInterface $raffles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Raffle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prizes'), ['controller' => 'Prizes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prize'), ['controller' => 'Prizes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="raffles index large-9 medium-8 columns content">
    <h3><?= __('Raffles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($raffles as $raffle): ?>
            <tr>
                <td><?= $this->Number->format($raffle->id) ?></td>
                <td><?= h($raffle->created) ?></td>
                <td><?= h($raffle->modified) ?></td>
                <td><?= h($raffle->title) ?></td>
                <td><?= $raffle->has('user') ? $this->Html->link($raffle->user->username, ['controller' => 'Users', 'action' => 'view', $raffle->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $raffle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $raffle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $raffle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raffle->id)]) ?>
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
