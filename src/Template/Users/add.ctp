<?php
$this->assign('title', 'ユーザー登録');
?>

<a><?= $this->Html->link('Back', ['action' => 'index'], ['class' => ['fs12']]); ?></a>
<h1>
    ユーザー登録
</h1>

<?= $this->Form->create($post); ?>
<?= $this->Form->input('user_id', array('type' => 'text')); ?>
<?= $this->Form->input('name'); ?>
<?= $this->Form->input('passwd'); ?>
<?= $this->Form->input('mail'); ?>
<?= $this->Form->input('status_code'); ?>
<?= $this->Form->input('limit_date'); ?>
<?= $this->Form->input('user_id_col'); ?>
<?= $this->Form->input('resource_path'); ?>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>
