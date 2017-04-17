<?php
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
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AdminsController
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
        
    }
    
    public function index()
    {   $data = array();
        /* product status change 
                1 . click on toggle icon then  call function exists in element
                dashboardheader   
                2 . Ajax to function call  productstatus
                3 . change status 
                4 . reload page
    */  
        $user = $this->Auth->user();
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
        $user = $this->Auth->user();
        if(!empty($user)){
            $userid = $user['id'];
        }else{
            $userid = '';
        }
       // $this->p($user);
        if ($this->request->is('post')) {
                //$this->p($this->request->getData());
                if(!empty($this->request->data['product_image']['name'])){
                    //$this->P($this->request->data['product_image']);
                $fileName   = $this->request->data['product_image']['name'];
                $tmp=explode(".", $fileName);
                $extension=end($tmp);
                $uniquesavename=time().uniqid(rand());
                $newfilename=$uniquesavename .".".$extension;
                $uploadPath = 'img/uploads/product/';
                $uploadFile = $uploadPath.$newfilename;
                if(move_uploaded_file($this->request->data['product_image']['tmp_name'],$uploadFile)){
                    $product = $this->Products->patchEntity($product, $this->request->getData());

                    $product->product_image = $newfilename;
                    $product->created  = date("Y-m-d H:i:s");
                    $product->modified = date("Y-m-d H:i:s");
                    $product->users_id = $userid;

                   //$this->p($product);
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
    //edit product status 
    public function productstatus(){
         if( $this->request->is('ajax') ) 
         {
             $id  = $this->request->data('id');
             $products = $this->Products->get($id, [
                    'contain' => []
                ]);
             $current_status = $products->status;
                if($current_status == 'Activated')
                {
                    $account = 'Blocked';
                }
            else{
                $account = 'Activated';
                }
            
                $products['status'] = $account;
              
              if ($this->Products->save($products)) 
                {
                    $data['response'] = $products;
                    $this->Flash->success(__('The Product Status Change Successfully.'));
                }
            else {
                    $data['response'] = "Error: some error";
                 }
            
       }
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }
    public function checkProductId($id = null){
        $return = array();
        $user = $this->Auth->user();
        if(!empty($id)){
            $return = $this->Products->find('All')->where(['id'=>$id,'users_id' => $user['id']])->count();
        }else{
            return $return;
        }
        return $return;
    }
}
