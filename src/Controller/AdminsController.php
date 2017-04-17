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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Event\Event;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class AdminsController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    
    public function initialize(){
        
               $this->loadComponent('Auth', [
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
            
        ],
        'loginRedirect' => [
                'controller' => 'Dashboards',
                'action' => 'index'
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
       
          $this->viewBuilder()->layout('dashboard');   
         }

 public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        
    }
    public function index(){
        
    }
   
    
    
    

}
