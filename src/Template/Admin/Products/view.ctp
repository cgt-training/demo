<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="top-bar expanded" data-topbar="" role="navigation">
    <ul class="title-area col-lg-3 col-md-4 columns">
        <li class="name">
        <h1>
        <a href=""><?= __('Products');?></a>
        </h1>
        </li>
    </ul>
    <section class="top-bar-section">
    <ul class="right">
        <li>
        <a target="_blank" href="http://book.cakephp.org/3.0/">
        <?= __('Documentation / API');?></a>
        </li>
       
    </ul>
</section>
</nav>
<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view col-lg-9 col-md-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Image') ?></th>
            <td>
                <?php
                if(!empty($product->product_image)){
                echo $this->Html->image('uploads/product/'.$product->product_image);}?>
            </td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
</div>




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
                <th scope="col"><?= $this->Paginator->sort( __('email') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort( __('created') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('modified') ) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                  
                </tr>
                <?php foreach ($employes as $employe): ?>
            <tr>
                <td><?= $this->Number->format($employe->id) ?></td>
                <td><?= h($employe->name) ?></td>
                <td><?= h($employe->email) ?></td>
               
                <td><?= h($employe->created) ?></td>
                <td><?= h($employe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>  
