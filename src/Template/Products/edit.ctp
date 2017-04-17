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
        <a target="_blank" href="http://book.cakephp.org/3.0/">
            <?= __('Documentation / API');?>
        </a>
        </li>
        
    </ul>
</section>
</nav>
<div class="row"></div>
<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
         <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="products form col-lg-9 col-md-8 columns content">
    <?php  //print_r($product);?>
    <?= $this->Form->create($product,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            
             echo $this->Form->control('product_image', [
    'type' => 'file'
]);
             if(!empty($product['product_image'])){
                echo $this->Html->image('uploads/product/'.$product['product_image']);

            }
             

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
