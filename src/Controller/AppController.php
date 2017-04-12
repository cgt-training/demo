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
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        //$this->loadComponent('Flash');

       $this->loadComponent('Auth', [
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
            
        ],
        'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
        'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                
            ],

        'authError' => 'Did you really think you are allowed to see that?',
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'rahul','password' => '123456']
            ]
        ],
        'storage' => 'Session'
    ]);
       $this->set('authUser', $this->Auth->user());
       $this->loadComponent('Cookie', ['expires' => '1 day']);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->viewBuilder()->layout('frontend');
        $this->checklogin();

    }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function beforeFilter(Event $event)
    {
       // $this->Cookie->delete('login');
        $this-> Auth-> allow('index');
        
        
    }

   public function p($p, $exit = 1)
    {
        echo '<pre>';
        print_r($p);
        echo '</pre>';
        if ($exit == 1)
        {
            exit;
        }
    }
    
public function isAuthorized($user)
{
    // Admin can access every action
    if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
    }
    // Default deny
    return false;
}
public function checklogin(){
   $cookies  = $this->Cookie->read('login');
        //echo $cookies;exit;
    if (!$this->Auth->user() && $this->Cookie->read('login')) {
        $cookies  = $this->Cookie->read('login');
        echo $cookies;exit;
        if(!empty($cookies)){
            $users = TableRegistry::get('Users');
            $data = $users->findByUsername('rahul');
        if ($data) {
            $this->Auth->setUser($data);
            return $this->redirect($this->Auth->redirectUrl());
        } else {
           // $this->Cookie->delete('login');
        }  
        }
       
    }
}

}
