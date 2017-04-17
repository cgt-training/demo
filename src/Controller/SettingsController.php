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


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SettingsController extends AppController
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
        $this->loadComponent('Paginator');
        // Set the layout
       // $this->viewBuilder()->layout('frontend');

    }

    
     public function index()
    {   
        $settings = $this->Settings->get('1');
     
       //$blog = $this->Blogs->newEntity();
    if ($this->request->is(['post','put'])) {
        $settings = $this->Settings->patchEntity($settings, $this->request->data);
        $settings->modified = date("Y-m-d H:i:s");
        if ($this->Settings->save($settings)) {
            $this->Flash->success(__('Your Theme has been Changes.'));
            return $this->redirect(['controller' => 'Articles','action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your post.'));
    }
    $this->set('post', $settings);  
    }
    
    
    
}
