<?php

namespace App\Controller;

class UsersController extends AppController
{

    public function index()
    {
        $users = $this->Users->find('all');
        $this->log($users, 7);
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
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success('Delete Success!');
        } else {
            $this->Flash->error('Delete Error!');
        }
        return $this->redirect(['action' => 'index']);
    }
}
