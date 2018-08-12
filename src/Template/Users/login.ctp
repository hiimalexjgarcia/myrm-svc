<?php
/**
 * @var \App\View\AppView $this
 */
?>
    <?php $render = $this->Flash->render('auth'); if ($render): ?>
    <div class="alert alert-warning">
        <?= $render ?>
    </div>
    <?php endif ?>

    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <div class="form-group">
            <?= $this->Form->control('username', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('password', ['class' => 'form-control']) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
