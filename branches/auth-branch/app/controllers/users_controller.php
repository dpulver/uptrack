<?php
class UsersController extends AppController
{
  var $name = 'Users';

  var $helpers = array('Form' );

  function register()
  {
    if (!empty($this->data))
    {
      $this->data['User']['password'] = md5($this->data['User']['password']);
      if ($this->User->save($this->data))
      {
        $this->Session->setFlash('Your registration information was accepted');
        $this->Session->write('user', $this->data['User']['username']);
        $this->redirect(array('action' => 'index'), null, true);
      } else {
        $this->data['User']['password'] = '';
        $this->Session->setFlash('There was a problem saving this information');
      }
    }
  }

  function knownusers()
  {
    $this->set('knownusers', $this->User->find(
      'all',
      array(
        'fields' => array('id','username', 'first_name', 'last_name', 'role_id'),
        'order' => 'id DESC'
      )
    ));
  }

  function login()
  {
    if ($this->data)
    {
      $results = $this->User->findByUsername($this->data['User']['username']);
      if ($results && $results['User']['password'] == md5($this->data
           	                                            ['User']['password']))
      {
        $this->Session->write('user', $this->data['User']['username']);
      $this->Session->write('user_id', $results['User']['id']);
    $this->redirect(array('action' => 'index'), null, true);
      } else {
        $this->set('error', true);
      }
    }
  }

  function logout()
  {
    $this->Session->delete('user');
      $this->Session->delete('user_id');
    $this->redirect(array('action' => 'login'), null, true);
  }

  function index()
  {
    $username = $this->Session->read('user');
    if ($username)
    {
      $results = $this->User->findByUsername($username);
      $this->set('user', $results['User']);
    } else {
      $this->redirect(array('action' => 'login'), null, true);
    }
  }
}
?>