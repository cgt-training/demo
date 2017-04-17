<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="top-bar expanded" data-topbar="" role="navigation">
    <ul class="title-area col-lg-3 col-md-4 columns">
        <li class="name">
        <h1>
        <a href=""><?= __('Products')?></a>
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

<div class="row"></div>
<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
   <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!-- <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li> -->
    </ul>
</nav>

<div class="products index col-lg-9 col-md-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('name') ) ?></th>
               
                 <th scope="col"><?= $this->Paginator->sort( __('images') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort( __('created') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('modified') ) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->name) ?></td>
                
                <td class="product_images"><?php
                if(!empty($product->product_image)){
                echo $this->Html->image('uploads/product/'.$product->product_image);}?>
            </td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?php if($product->productpermission == '1'){?>
<?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>

                    <?php      }?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
</div>
