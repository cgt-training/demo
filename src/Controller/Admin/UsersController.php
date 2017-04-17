<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\AdminsController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Event\Event;



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AdminsController
{
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
   public function initialize(){

        parent::initialize();
        $this->set('authUser', $this->Auth->user());     
       $this->viewBuilder()->layout('admin');

    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add','login');
        // Simple setup
        $this->Auth->config('authenticate', ['Form']);
    }
    public function index(){
        
    }
    public function login(){
         if (!$this->Auth->user() ){
        if ($this->request->is('post')) {
            //$this->p($this->request->getData());
              $user = $this->Auth->identify();
            if ($user) {
                $id = $user['id'];
                $userss = TableRegistry::get('Users');
                $query = $userss->find()
                ->select(['username','password','role'])
                ->where(['id =' => $id]);
                $data = $query->toArray();
              //$this->p($data);
              if(!empty($data)){
                if($data[0]['role'] == 'admin'){
                    $this->Auth->setUser($user);
                    $this->Cookie->write('login',
                    ['username' => $user['username'],'password' => $data[0]['password']]
);
                    return $this->redirect($this->Auth->redirectUrl());
                 }    
              }
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        }
        else{

           return $this->redirect($this->Auth->redirectUrl()); 
        }
   

     }
     public function logout()
    {
        $this->Cookie->delete('login');
        return $this->redirect($this->Auth->logout());
    }
    
    
    
    
}

