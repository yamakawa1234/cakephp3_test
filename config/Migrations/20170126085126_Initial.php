<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('error_log')
            ->addPrimaryKey([''])
            ->addColumn('error_log_id', 'integer', [
                'comment' => 'ログID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'comment' => '該当プログラム',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('user_id', 'string', [
                'comment' => 'ユーザーid',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('occur_time', 'datetime', [
                'comment' => '発生時間',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('error_code', 'string', [
                'comment' => 'ステータスコード',
                'default' => null,
                'limit' => 9,
                'null' => true,
            ])
            ->addColumn('detail', 'string', [
                'comment' => '詳細',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addIndex(
                [
                    'error_log_id',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('error_setting_info')
            ->addColumn('error_setting_id', 'integer', [
                'comment' => 'エラーセッテングID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addPrimaryKey(['error_setting_id'])
            ->addColumn('user_id', 'integer', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('check_colom', 'string', [
                'comment' => 'チェック項目',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('check_case', 'string', [
                'comment' => 'チェック内容',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('check_value', 'string', [
                'comment' => 'チェックの値',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('create_time', 'datetime', [
                'comment' => '作成日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_time', 'datetime', [
                'comment' => '更新日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('master_type')
            ->addPrimaryKey([''])
            ->addColumn('master_id', 'integer', [
                'comment' => 'マスタID',
                'default' => null,
                'limit' => 7,
                'null' => true,
            ])
            ->addColumn('master_name', 'string', [
                'comment' => 'マスタ名称',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('create_time', 'datetime', [
                'comment' => '作成日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_time', 'datetime', [
                'comment' => '更新日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('posts')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('body', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('resource')
            ->addColumn('resource_id', 'integer', [
                'comment' => 'リソースID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addPrimaryKey(['resource_id'])
            ->addColumn('user_id', 'string', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('master_id', 'integer', [
                'comment' => 'マスタID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('master_file_name', 'string', [
                'comment' => 'マスタファイル名',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('create_time', 'datetime', [
                'comment' => '作成日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_time', 'datetime', [
                'comment' => '更新日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('template_relation')
            ->addColumn('relation_id', 'integer', [
                'comment' => 'テンプレート関係ID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addPrimaryKey(['relation_id'])
            ->addColumn('user_id', 'integer', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('resource_id', 'integer', [
                'comment' => 'リソースID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addColumn('user_header', 'string', [
                'comment' => 'ユーザーフォーマットヘッダー名',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('cbase_header', 'string', [
                'comment' => 'シーベースフォーマットヘッダー名',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('create_time', 'datetime', [
                'comment' => '作成日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_time', 'datetime', [
                'comment' => '更新日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('user_id', 'string', [
                'comment' => 'ユーザーID',
                'default' => null,
                'limit' => 7,
                'null' => false,
            ])
            ->addPrimaryKey(['user_id'])
            ->addColumn('user_name', 'string', [
                'comment' => 'ユーザーネーム',
                'default' => null,
                'limit' => 30,
                'null' => true,
            ])
            ->addColumn('passwd', 'string', [
                'comment' => 'パスワード',
                'default' => null,
                'limit' => 30,
                'null' => true,
            ])
            ->addColumn('mail', 'string', [
                'comment' => 'メール',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('status_code', 'string', [
                'comment' => 'ステータス',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('limit_date', 'datetime', [
                'comment' => '有効期限',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id_col', 'integer', [
                'comment' => 'ユーザーIDの桁数',
                'default' => null,
                'limit' => 2,
                'null' => true,
            ])
            ->addColumn('resorce_path', 'string', [
                'comment' => 'リソースのパス',
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('create_date', 'datetime', [
                'comment' => '作成日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('update_date', 'datetime', [
                'comment' => '更新日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('error_log');
        $this->dropTable('error_setting_info');
        $this->dropTable('master_type');
        $this->dropTable('posts');
        $this->dropTable('resource');
        $this->dropTable('template_relation');
        $this->dropTable('users');
    }
}
