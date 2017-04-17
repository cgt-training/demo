<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <?=  $this->Html->image('user2-160x160.jpg', array('class'=> 'img-circle'));?>
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo $this->Url->build(["controller" => "Dashboards","action" => "index"]);
?>">
            <i class="fa fa-th"></i> <span><?= __('Dashboard');?></span>
            
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= __('Employes')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Employes","action" => "add"]);
?>"><i class="fa fa-circle-o"></i> <?= __('Add Employes'); ?></a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Employes","action" => "view"]);
?>"><i class="fa fa-circle-o"></i> <?= __('View Employes')?> </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= __('Products')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Products","action" => "add"]);
?>"><i class="fa fa-circle-o"></i> <?= __('Add Products'); ?></a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Products","action" => "index"]);
?>"><i class="fa fa-circle-o"></i> <?= __('View Products')?> </a></li>
          </ul>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= __('Articles')?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build(["controller" => "Articles","action" => "add"]);
?>"><i class="fa fa-circle-o"></i> <?= __('Add Articles'); ?></a></li>
            <li><a href="<?php echo $this->Url->build(["controller" => "Articles","action" => "index"]);
?>"><i class="fa fa-circle-o"></i> <?= __('View Articles')?> </a></li>
          </ul>
        </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>