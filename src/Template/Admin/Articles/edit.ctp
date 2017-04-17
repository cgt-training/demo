<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content-header">
      <h1>
        <?= __('Articles');?>
        <small><?= __('Control panel');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Articles');?></a></li>
        <li class="active"><?= __('Dashboard');?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Articles Form');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
             <?= $this->Form->create($article, array('class' => 'form-horizontal','inputDefaults' => array(
  'label' => false,'div' => false,)));?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('title'); ?></label>
                  <div class="col-sm-5">
                     <?= $this->Form->control('title', array('label' => false,'placeholder'=>'title','class'=>'form-control')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('body'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('body', array('label' => false,'placeholder'=>'body','class'=>'form-control')); ?>
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
        </div>
    </section>

