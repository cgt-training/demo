<?php 

use Cake\View\Helper\UrlHelper;

?>
<header>
<div class=""></div>
  <div class="container top_header">
    <div class="col-lg-12">
      <div class="col-lg-3 logo">

<?php echo $this->Html->image('logo.png',array('alt'=>'myimage','class'=>'img-responsive')); ?>
        </div>
      <div class="col-lg-9 tag-line">And a little tagline , too</div>
    </div>
  </div>
   <div class="container">
    <nav class="navbar navbar-default row">
  <div class="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="<?php echo $this->Url->build(["controller" => "Blogs","action" => "view"]);
?>"><?= __('Blog'); ?></a></li>
      <li><a href="<?php echo $this->Url->build(["controller" => "Articles","action" => ""]);
?>"><?= __('Article'); ?></a></li>
      <li><a href="<?php echo $this->Url->build(["controller" => "Products","action" => "index"]);
?>"> <?= __('Product'); ?></a></li>
<?php 
if (!$authUser)
{ ?>
  <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "login"]);
?>"> <?= __('log in'); ?></a></li>  
<?php }else{
?>
<li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "logout"]);
?>"> <?= __('logout'); ?></a></li>
<?php } ?>
      
<li><a href="<?php echo $this->Url->build(["controller" => "Settings","action" => "index"]);
?>"> <?= __('Theme Change'); ?></a></li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  </div>
</header>