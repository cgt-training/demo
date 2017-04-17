<?php
/**
  * @var \App\View\AppView $this
  */
?>



<section class="content-header">
      <h1>
        Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= __('Products Table'); ?></h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                 <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('name') ) ?></th>
               
                 <th scope="col"><?= $this->Paginator->sort( __('images') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort( __('created') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('modified') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('Status') ) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
               <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                
                <td class="product_images" ><?php
                if(!empty($product->product_image)){
                echo $this->Html->image('uploads/product/'.$product->product_image);}?>
            </td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td id="product_status" productid="<?php echo $this->Number->format($product->id) ?>">
                  <?php  //echo $employe->account;
                  if($product->status == 'Activated'){
                    echo '<i class="fa fa-toggle-on toggle_on" aria-hidden="true"></i>';
                  }else{
                    echo '<i class="fa fa-toggle-off toggle_off" aria-hidden="true"></i>';
                  }
                  ?>
                </td>
                <!-- product status change 
                1 . click on toggle icon then  call function exists in element
                dashboardheader   
                2 . Ajax function call ProductController in productstatus
                3 . change status 
                4 . reload page
                -->               
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
              </table>
              <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>  

