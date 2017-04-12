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
class BlogsController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public $paginate = [
        'limit' => 25,
        'order' => [
            'Articles.title' => 'asc'
        ]
    ];
    public function initialize(){

        parent::initialize();
        $this->loadComponent('Paginator');
        // Set the layout
       // $this->viewBuilder()->layout('frontend');

    }

    public function display() {

        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    
    public function index(){

   
    }
     public function add()
    {   
        $post = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Blogs->patchEntity($post, $this->request->data);
            $post->created = date("Y-m-d H:i:s");
            $post->modified = date("Y-m-d H:i:s");
            if ($this->Blogs->save($post)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $this->set('post', $post);
    }
    
    public function view(){

        $blogs = $this->Blogs->find('all')->toArray();
        //$this->p($blogs);
        $this->set(compact('blogs'));

    }
    public function edit($id = null){
        //$this->p($id);
      $blog = $this->Blogs->get($id);
      //$this->p($blog);
       //$blog = $this->Blogs->newEntity();
    if ($this->request->is(['post','put'])) {
        $blog = $this->Blogs->patchEntity($blog, $this->request->data);
        $blog->modified = date("Y-m-d H:i:s");

        if ($this->Blogs->save($blog)) {
            $this->Flash->success(__('Your post has been updated.'));
            return $this->redirect(['action' => 'view']);
        }
        $this->Flash->error(__('Unable to update your post.'));
    }
    $this->set('post', $blog);  
    }
    public function delete($id)
{
    $this->request->allowMethod(['post', 'delete']);

    $blog = $this->Blogs->get($id);
    if ($this->Blogs->delete($blog)) {
        $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'view']);
    }
}
}
