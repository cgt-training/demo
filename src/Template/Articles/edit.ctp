<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="top-bar expanded" data-topbar="" role="navigation">
    <ul class="title-area col-lg-3 col-md-4 columns">
        <li class="name">
        <h1>
        <a href="">Articles</a>
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

<div class="row"></div>
<nav class="col-lg-3 col-md-4 columns" id="actions-sidebar">
    <ul class="side-nav">
         <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="articles form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
