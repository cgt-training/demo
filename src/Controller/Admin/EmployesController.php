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



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class EmployesController extends AdminsController
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
        $this->loadComponent('RequestHandler');
        //$this->loadComponent('Paginator');
        // Set the layout
       // $this->viewBuilder()->layout('frontend');


    }
    public function index(){
        
    }
    public function add(){

    $employes = $this->Employes->newEntity();
    
        if ($this->request->is('post')) {
            //$this->p($this->request->getData());
            $employes = $this->Employes->patchEntity($employes, $this->request->data);
            $employes->created = date("Y-m-d H:i:s");
            $employes->modified = date("Y-m-d H:i:s");
           
            if ($this->Employes->save($employes)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $this->set('post', $employes);

     }
     public function view(){
        $employes = $this->paginate($this->Employes);
        //$this->p($employes);
        $this->set(compact('employes'));
        $this->set('_serialize', ['employes']);
     }
      public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employes= $this->Employes->get($id);
        if ($this->Employes->delete($employes)) {
            $this->Flash->success(__('The Employes has been deleted.'));
        } else {
            $this->Flash->error(__('The Employes could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view']);
    }
    public function edit($id = null)
    {
        $employes = $this->Employes->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employes = $this->Employes->patchEntity($employes, $this->request->getData());
            if ($this->Employes->save($employes)) {
                $this->Flash->success(__('The employes has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The employes could not be saved. Please, try again.'));
        }
        $this->set(compact('employes'));
        $this->set('_serialize', ['employes']);
    }
    public function activeemployes(){
       if( $this->request->is('ajax') ) {
     // echo $_POST['value_to_send'];
     $id  = $this->request->data('id');
     $employes = $this->Employes->get($id, [
            'contain' => []
        ]);
     $current_status = $employes->account;
     if($current_status == 'Activated'){
        $account = 'Blocked';
     }
     else{
        $account = 'Activated';
        }
     //$record = $employes['']
        $employes['account'] = $account;
       //$this->p($employes); 
      if ($this->Employes->save($employes)) {
        $data['response'] = $employes;
            //echo $result->id;
          $this->Flash->success(__('The employes Account Status change Successfully.'));
        }
        else {
            $data['response'] = "Error: some error";
            //print_r($emp);
        }
        
            }
             $this->set(compact('data'));
            $this->set('_serialize', 'data');
    
    
    
   
    }
    
    

}
