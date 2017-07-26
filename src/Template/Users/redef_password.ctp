<?php
/**
 * @var \App\View\AppView $this
 */

//InputMask
echo $this->Html->script('AdminLTE./plugins/input-mask/jquery.inputmask');
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Redefiny Password') ?></legend>
        <?= $this->Form->hidden('token', ['value' => $token]);?>
        <?= $this->Form->control('Password', ['label' => 'Password:', 'value' => '', 'type' => 'password']);?>
        <?= $this->Form->control('confirm_password', ['label' => 'Confirm Password:', 'type' => 'password', 'value' => '']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>