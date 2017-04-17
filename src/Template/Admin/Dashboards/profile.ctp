<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content-header">
      <h1>
        <?= __('Profile');?>
        <small><?= __('Control panel');?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Profile');?></a></li>
        <li class="active"><?= __('Dashboard');?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Profile Form');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
             <?= $this->Form->create($user, array('class' => 'form-horizontal','inputDefaults' => array(
  'label' => false,'div' => false,)));?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('name'); ?></label>
                  <div class="col-sm-5">
                     <?= $this->Form->control('name', array('label' => false,'placeholder'=>'name','class'=>'form-control')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('email'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('email', array('label' => false,'placeholder'=>'email','class'=>'form-control')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Number'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('phone_number', array('label' => false,'placeholder'=>'phone number','class'=>'form-control')); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Address'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('address', array('type'=> 'textarea' ,'label' => false,'placeholder'=>'Address','class'=>'form-control')); ?>
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

