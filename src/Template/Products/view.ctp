<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="top-bar expanded" data-topbar="" role="navigation">
    <ul class="title-area col-lg-3 col-md-4 columns">
        <li class="name">
        <h1>
        <a href="">Products</a>
        </h1>
        </li>
    </ul>
    <section class="top-bar-section">
    <ul class="right">
        <li>
        <a target="_blank" href="http://book.cakephp.org/3.0/">Documentation / API</a>
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
            <th scope="row"><?= __('Modified') ?></th>
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
