<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Raffle $raffle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Raffle'), ['action' => 'edit', $raffle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Raffle'), ['action' => 'delete', $raffle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raffle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Raffles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raffle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prizes'), ['controller' => 'Prizes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prize'), ['controller' => 'Prizes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="raffles view large-9 medium-8 columns content">
    <h3><?= h($raffle->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($raffle->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $raffle->has('user') ? $this->Html->link($raffle->user->username, ['controller' => 'Users', 'action' => 'view', $raffle->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($raffle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($raffle->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($raffle->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($raffle->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prizes') ?></h4>
        <?php if (!empty($raffle->prizes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Raffle Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raffle->prizes as $prizes): ?>
            <tr>
                <td><?= h($prizes->id) ?></td>
                <td><?= h($prizes->created) ?></td>
                <td><?= h($prizes->modified) ?></td>
                <td><?= h($prizes->name) ?></td>
                <td><?= h($prizes->description) ?></td>
                <td><?= h($prizes->user_id) ?></td>
                <td><?= h($prizes->raffle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prizes', 'action' => 'view', $prizes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prizes', 'action' => 'edit', $prizes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prizes', 'action' => 'delete', $prizes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prizes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($raffle->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Raffle Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raffle->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->created) ?></td>
                <td><?= h($tickets->modified) ?></td>
                <td><?= h($tickets->user_id) ?></td>
                <td><?= h($tickets->raffle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
