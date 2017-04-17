<?php 

use Cake\View\Helper\UrlHelper;

?>
<header>
<div class="container-fluid top-header">
    <div class="container">
      <div class="col-lg-12">
       
       <div class="col-lg-12 col-md-12 col-sm-12 menu">
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
     <a class="navbar-brand" href="#">
<?php echo $this->Html->image('logoBlog.png',array('alt'=>'myimage','width'=>'100','class'=>'img-responsive')); ?>
      </a>
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
       
      </div>
    </div>
</div>
<div class="container-fluid slider">
  <div class="container">
  <div class="row">
  <div class="col-lg-12" style="border: 1px slider">
        <div class="col-md-12  page_title">blog</div>
        <div class="col-md-12 page_link">Home / <span>Blog</span></div>
   </div>
   </div>
    </div>
  
  
</div>

</header>