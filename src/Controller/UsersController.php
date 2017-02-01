<?php

namespace App\Controller;

class UsersController extends AppController
{
    /**
     * ログインページ
     * @return type
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('ユーザー名かパスワードが間違ってまっせ');
        }
    }

    /**
     * ログアウト
     * @return bool
     */
    public function logout()
    {
        $this->request->session()->destroy(); // セッションの破棄
        return $this->redirect($this->Auth->logout()); // ログアウト処理
    }

//    //読み込むコンポーネントの指定
//    public $components = array('Auth');
//
//    //どのアクションが呼ばれてもはじめに実行される関数
//    public function beforeFilter()
//    {
//        parent::beforeFilter();
//
//        //未ログインでアクセスできるアクションを指定
//        //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
//        $this->Auth->allow('add', 'login');
//    }
//
//    public function login()
//    {
//        if ($this->request->is('post')) {
//            if ($this->Auth->login())
//                return $this->redirect('index');
//            else
//                $this->Session->setFlash('ログイン失敗');
//        }
//    }
//
//    public function logout()
//    {
//        $this->Auth->logout();
//        $this->redirect('login');
//    }

    public function index()
    {
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        // $post = $this->Posts->get($id);
        $post = $this->Posts->get($id, [
            'contain' => 'Comments'
        ]);
        $this->set(compact('post'));
    }

    public function add()
    {
        $post = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Users->patchEntity($post, $this->request->data);
            if ($this->Users->save($post)) {
                $this->Flash->success('追加成功');
                return $this->redirect(['action' => 'index']);
            } else {
                // error
                $this->Flash->error('追加失敗');
            }
        }
        $this->set(compact('post'));
    }

    public function edit($id = null)
    {
        $post = $this->Users->get($id);
        if ($this->request->is(['post', 'patch', 'put'])) {
            $post = $this->Users->patchEntity($post, $this->request->data);
            if ($this->Users->save($post)) {
                $this->Flash->success('編集成功');
                return $this->redirect(['action' => 'index']);
            } else {
                // error
                $this->Flash->error('編集失敗');
            }
        }
        $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Users->get($id);
        if ($this->Users->delete($post)) {
            $this->Flash->success('削除成功');
            $this->Flash->set('The user has been saved.');
        } else {
            $this->Flash->error('削除失敗');
        }
        return $this->redirect(['action' => 'index']);
    }
//    public function delete($id = null)
//    {
//        $this->request->allowMethod(['post', 'delete']);
//        $comment = $this->Comments->get($id);
//        if ($this->Comments->delete($comment)) {
//            $this->Flash->success('Comment Delete Success!');
//            $this->Flash->set('The user has been saved.');
//
//        } else {
//            $this->Flash->error('Comment Delete Error!');
//        }
//        return $this->redirect(['controller'=>'Posts', 'action'=>'view', $comment->post_id]);
//    }
}
