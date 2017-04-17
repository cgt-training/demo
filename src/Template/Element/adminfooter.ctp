<?= $this->Html->script('http://code.jquery.com/jquery-1.11.1.min.js');?>
 <?= $this->Html->script('Admin/plugins/jQuery/jquery-2.2.3.min.js');?>
 <?= $this->Html->script('Admin/bootstrap/js/bootstrap.min.js');?>
 <?= $this->Html->script('Admin/plugins/iCheck/icheck.min.js');?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
