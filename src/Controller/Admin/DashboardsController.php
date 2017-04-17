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
class DashboardsController extends AdminsController
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
        $this->viewBuilder()->layout('dashboard');
    }
    public function index(){
      $data = array(); 
      $products = TableRegistry::get('Products');
      $articles = TableRegistry::get('Articles');
      $employes = TableRegistry::get('Employes');
      $product = $products->find()->count();
      $article = $articles->find()->count();
      $employe = $employes->find()->count();
      if(!empty($product)){
            $data['products'] = $product;
        }
      if(!empty($article)){
        $data['articles'] = $article;
        }
         if(!empty($employe)){
        $data['employes'] = $employe;
        }
      $this->set(compact('data'));
      $this->set('_serialize', ['data']);
    }
    public function profile($id = null){
        $loginuser = $this->Auth->user();
        $id = $loginuser['id'];
        $users= TableRegistry::get('Users');
        $user = $users->get($id, [
            'contain' => []
        ]);
        //$this->p($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $users->patchEntity($user, $this->request->getData());
            if ($users->save($user)) {
                $this->Flash->success(__('The Profile  has been saved.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The Profile could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
   
}

