<?php
$this->assign('title', 'ユーザー一覧');
?>

<h1>
  ユーザー一覧
</h1>

<a><?= $this->Html->link('ユーザー登録', ['action'=>'add'], ['class'=>['pull-left', 'fs12']]); ?></a></br>
<table border="1">
    <tr>
        <th>ユーザーID</th>
        <th>ユーザーネーム</th>
        <th>パスワード</th>
        <th>メールアドレス</th>
        <th>ステータス</th>
        <th>有効期限</th>
        <th>ユーザーIDの桁数</th>
        <th>リソースのフォルダ</th>
        <th>作成日</th>
        <th>更新日</th>
    </tr>
<?php foreach ($users as $user) : ?>
<tr>
    <td><?= h($user->user_id); ?></td>
    <td><?= h($user->name); ?></td>
    <td><?= h($user->passwd); ?></td>
    <td><?= h($user->mail); ?></td>
    <td><?= h($user->status_code); ?></td>
<!--    <td>--><?//= h($user->limit_date); ?><!--</td>-->
    <td><?= h(date("Y年m月d日 H:i",strtotime($user->limit_date))); ?></td>
    <td><?= h($user->user_id_col); ?></td>
    <td><?= h($user->resorce_path); ?></td>
<!--    <td>--><?//= h($user->create_date); ?><!--</td>-->
    <td><?= h(date("Y年m月d日 H:i",strtotime($user->create_date))); ?></td>
<!--    <td>--><?//= h($user->update_date); ?><!--</td>-->
    <td><?= h(date("Y年m月d日 H:i",strtotime($user->update_date))); ?></td>
    <td><?= $this->Html->link('[編集]', ['action'=>'edit', $user->user_id], ['class'=>'fs12']); ?></br>
        <?=
        $this->Form->postLink(
            '[削除]',
            ['action' => 'delete', $user->user_id],
            ['confirm' => '削除してもよろしいですか？', 'class' => 'fs12']
        );
        ?></td>
<!--    --><?//= $this->Html->link('[削除]', ['action'=>'delete', $user->user_id], ['class'=>'fs12']); ?><!--</td>-->
</tr>
<?php endforeach; ?>
</table>
