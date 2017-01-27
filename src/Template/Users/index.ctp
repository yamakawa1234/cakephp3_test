<?php
$this->assign('title', 'ユーザー一覧');
?>

<h1>
  <?= $this->Html->link('ユーザー登録', ['action'=>'add'], ['class'=>['pull-right', 'fs12']]); ?>
  ユーザー一覧
</h1>

<?= $this->log($users,7); ?>
<table border="1">
    <tr>
        <th>ユーザーID</th>
        <th>ユーザーネーム</th>
        <th>パスワード</th>
        <th>ステータス</th>
        <th>有効期限</th>
        <th>ユーザーIDの桁数</th>
        <th>リソースのフォルダ</th>
        <th>作成日</th>
        <th>更新日</th>
    </tr>
<?php foreach ($users as $user) : ?>
<tr>
    <td><?= $this->Html->link($user->user_name, ['action'=>'view', $user->id]); ?></td>
    <td><?= h($user->passwd); ?></td>
    <td><?= h($user->mail); ?></td>
    <td><?= h($user->status_code); ?></td>
    <td><?= h($user->limit_date); ?></td>
    <td><?= h($user->user_id_col); ?></td>
    <td><?= h($user->resource_path); ?></td>
    <td><?= h($user->create_date); ?></td>
    <td><?= h($user->update_date); ?></td>
    <td><?= $this->Html->link('[Edit]', ['action'=>'edit', $user->id], ['class'=>'fs12']); ?></td>
</tr>
<?php endforeach; ?>
</table>