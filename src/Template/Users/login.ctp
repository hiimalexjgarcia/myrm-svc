<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form large-12 medium-12 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>
