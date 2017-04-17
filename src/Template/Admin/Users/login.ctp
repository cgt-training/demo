<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b> Panel</a>
  </div>
  <!-- /.login-logo -->
  <?php 

  ?>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
      <?= $this->Form->create('login', array('id' => 'form-login','inputDefaults' => array(
  'label' => false,'div' => false,'autocomplete'=>'off')));?>
      <div class="form-group has-feedback">
         <?= $this->Form->control('username', array('label' => false,'placeholder'=>'username','class'=>'form-control','autocomplete'=>'off')); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
         <?= $this->Form->control('password', array('type'=>'password','label' => false,'placeholder'=>'password','class'=>'form-control','autocomplete'=>'off')); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <?= $this->Form->button(__('Sign In'),array('class'=>'btn btn-primary btn-block btn-flat')); ?>
        </div>
        <!-- /.col -->
      </div>
   <?= $this->Form->end() ?>
    <div class="social-auth-links text-center" style="display:none;">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
        <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>
    </div>
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>