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
<section class="content">
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= __('Employes Table'); ?></h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('name') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort( __('email') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort( __('created') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('modified') ) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('Account Action') ) ?></th>
                <th scope="col" class="active" ><?= __('Actions') ?></th>
                  
                </tr>
                <?php foreach ($employes as $employe): ?>
            <tr>
                <td><?= $this->Number->format($employe->id) ?></td>
                <td><?= h($employe->name) ?></td>
                <td><?= h($employe->email) ?></td>
               
                <td><?= h($employe->created) ?></td>
                <td><?= h($employe->modified) ?></td>
                 <td id="account_activate" recordid="<?php echo $this->Number->format($employe->id) ?>">
                  <?php  //echo $employe->account;
                  if($employe->account == 'Activated'){
                    echo '<i class="fa fa-toggle-on toggle_on" aria-hidden="true"></i>';
                  }else{
                    echo '<i class="fa fa-toggle-off toggle_off" aria-hidden="true"></i>';
                  }
                  ?>
                </td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>	
