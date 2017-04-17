	<section class="content-header">
      <h1>
        Employes
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employes</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Employes Form');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <?= $this->Form->create($employes, array('class' => 'form-horizontal','inputDefaults' => array(
  'label' => false,'div' => false,)));?>
            
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Name'); ?></label>

                  <div class="col-sm-5">
                     <?= $this->Form->control('name', array('label' => false,'placeholder'=>'name','class'=>'form-control')); ?>
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Email'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('email', array('label' => false,'placeholder'=>'Email','class'=>'form-control')); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= __('Father Name'); ?></label>
    <div class="col-sm-5">
                     <?= $this->Form->control('father_name', array('label' => false,'placeholder'=>'Father Name','class'=>'form-control')); ?>
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
         
        </div>
       
        </div>
      
    </section>
   
    