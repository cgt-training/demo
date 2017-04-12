<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        
    }
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow('edit');
        $this->Cookie->write('User',
    ['username' => 'rahul', 'password' => '123456']
);

        //$this->Cookie->config('name', 'rahul');
    }
    public function index()
    {  
        
    
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
        
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

                if(!empty($this->request->data['product_image']['name'])){
                    //$this->P($this->request->data['product_image']);
                $fileName   = $this->request->data['product_image']['name'];
                $extension=end(explode(".", $fileName));
                
                $uniquesavename=time().uniqid(rand());
                $newfilename=$uniquesavename .".".$extension;
                $uploadPath = 'img/uploads/product/';
                $uploadFile = $uploadPath.$newfilename;
                if(move_uploaded_file($this->request->data['product_image']['tmp_name'],$uploadFile)){
                    $product = $this->Products->patchEntity($product, $this->request->getData());
                    $product->product_image = $newfilename;
                    $product->created  = date("Y-m-d H:i:s");
                    $product->modified = date("Y-m-d H:i:s");
                  // $this->p($product);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
                 
                }else{
                    $this->Products->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Products->error(__('Please choose a file to upload.'));
            }
            
        }
         /*   $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }*/
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        $data = $this->Products->get($id, [
            'contain' => []
        ]);
        $product = $this->Products->patchEntity($product, $this->request->getData());
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['product_image']['name'])){
                $fileName = $this->request->data['product_image']['name'];
                $tmp=explode(".", $fileName);
                $extension=end($tmp);
                $uniquesavename=time().uniqid(rand());
                $newfilename=$uniquesavename .".".$extension;
                $uploadPath = 'img/uploads/product/';
                $uploadFile = $uploadPath.$newfilename;
                if(move_uploaded_file($this->request->data['product_image']['tmp_name'],$uploadFile)){
                    $product->product_image = $newfilename;
                }
            }else{
               $product->product_image = $data->product_image;   
            }
           // $this->p($product);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $directory = WWW_ROOT . 'img/uploads/product/';
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if (file_exists($directory. $product->product_image)){
           if(unlink($directory.$product->product_image))  
            {
                echo 'image deleted.....';  
            }
             
        }
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
