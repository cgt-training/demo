<div class="users form">
<?= $this->Form->create($user, array(
'id' => 'form-login',
'inputDefaults' => array(
    'label' => false,
    'div' => false

)
  ));
 ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Author']
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>

<script >
    $('#form-login').validate({
        rules: {
            'username': {
                required: true,
            },
            'email': {
                required: true,
                email:true,
            },
            'password': {
                required: true,
            },
        },
        messages: {
            'username': {
                required: "Please enter username",
            },
           'email': {
                required: "Please enter email",
                email: "Please enter valid email",
            },
          
            'password': {
                required: "Please enter password",
            },
            
        },
    });
</script>