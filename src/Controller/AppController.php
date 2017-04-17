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
use Cake\I18n\I18n;

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
                'fields' => ['username' => '','password' => '']
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
        $themes = TableRegistry::get('Settings');
         //$query = $themes->find()->toarray();
         $query = $themes->find()->toarray();
         //$this->p($query[0]);
         if(!empty($query)){
            $name     = $query[0]['name'];
            $language = $query[0]['language'];
            
            if(!empty($language)){
                I18n::locale($language);    
            }else{
                I18n::locale('en_US');
            }
             
            if($name == '2'){
                $this->viewBuilder()->theme('Modern');
            }else if($name == '3'){
                $this->viewBuilder()->theme('Event');
            }else{

            }
         }else{

         }
        
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    public function beforeFilter(Event $event)
    {
       // $this->Cookie->delete('login');
        $this-> Auth-> allow('index','login');
        
        
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
     
    if (!$this->Auth->user() && $this->Cookie->read('login')) {
        $cookies  = $this->Cookie->read('login');
       // $this->p($cookies);
        if(!empty($cookies)){
            $users = TableRegistry::get('Users');
            $username = $cookies['username'];
            $data = $users->findByUsername($username)->toarray();
            //$this->p($data);
        if ($data) {
            $this->Auth->setUser($data[0]);

            return $this->redirect($this->Auth->redirectUrl());
        } else {
           // $this->Cookie->delete('login');
        }  
        }
       
    }
}

}
