<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prize $prize
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prize'), ['action' => 'edit', $prize->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prize'), ['action' => 'delete', $prize->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prize->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prizes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prize'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prizes view large-9 medium-8 columns content">
    <h3><?= h($prize->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($prize->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $prize->has('user') ? $this->Html->link($prize->user->username, ['controller' => 'Users', 'action' => 'view', $prize->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prize->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($prize->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($prize->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($prize->description)); ?>
    </div>
</div>
