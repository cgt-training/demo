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
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Products Form');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
             <?= $this->Form->create($product, array('type' => 'file','class' => 'form-horizontal','inputDefaults' => array(
  'label' => false,'div' => false,)));?>
            
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Name'); ?></label>

                  <div class="col-sm-5">
                     <?= $this->Form->control('name', array('label' => false,'placeholder'=>'name','class'=>'form-control','value' => '' )); ?>
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Description'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('description', array('label' => false,'placeholder'=>'Description','class'=>'form-control','value' => '' )); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('product image'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('product_image', array('type' => 'file','label' => false,'class'=>'form-control','value' => '' )); ?>
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-info pull-right')); ?>
               
              </div>
              <!-- /.box-footer -->
           <?= $this->Form->end() ?>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
       
        </div>
        <!-- /.col (right) -->
   
      <!-- /.row -->

    </section>
   
    <!-- /.content -->
  