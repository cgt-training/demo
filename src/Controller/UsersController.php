<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
        // Simple setup
        $this->Auth->config('authenticate', ['Form']);

    }

    public function index()
    {
       
       $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        // print_r($this->request->getData());die();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created = date("Y-m-d H:i:s");
            $user->modified = date("Y-m-d H:i:s");
            $username =  $user['username'];
            $count_row = $this->Users->find()->where(['username' => $username])->count();
            if(isset($count_row)){
                if($count_row == 0){
                if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
                }else{
                  $this->Flash->success(__('This username Allready Exits.'));  
                }
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            //$this->p($user);
            if ($user) {
              
                $id = $user['id'];
                $userss = TableRegistry::get('Users');
                $query = $userss->find()
                ->select(['username','password','role'])
                ->where(['id =' => $id]);
                $data = $query->toArray();
              
                $this->Auth->setUser($user);
                $this->Cookie->write('login',
            ['username' => $user['username']]
);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function logout()
    {
        $this->Cookie->delete('login');
        return $this->redirect($this->Auth->logout());
    }
    public function dashboard(){
       $user = array();
       $user['name'] = $this->Auth->user('username');
       $user['role'] = $this->Auth->user('role');
       $fred = 'Fred Flinstone';
       $this->set(compact('user', 'fred'));
      
    }

}


?>