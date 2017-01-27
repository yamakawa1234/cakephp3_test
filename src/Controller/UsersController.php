<?php

namespace App\Controller;

class UsersController extends AppController
{

  public function index()
  {
    $users = $this->Users->find('all');
	$this->log($users,7);
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
    $post = $this->Posts->newEntity();
    if ($this->request->is('post')) {
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('Add Success!');
        return $this->redirect(['action'=>'index']);
      } else {
        // error
        $this->Flash->error('Add Error!');
      }
    }
    $this->set(compact('post'));
  }

  public function edit($id = null)
  {
    $post = $this->Posts->get($id);
    if ($this->request->is(['post', 'patch', 'put'])) {
      $post = $this->Posts->patchEntity($post, $this->request->data);
      if ($this->Posts->save($post)) {
        $this->Flash->success('Edit Success!');
        return $this->redirect(['action'=>'index']);
      } else {
        // error
        $this->Flash->error('Edit Error!');
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
    return $this->redirect(['action'=>'index']);
  }
}
