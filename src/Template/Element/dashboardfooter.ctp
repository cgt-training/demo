<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 .Admin</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div> 

  
  

<?= $this->Html->script('http://code.jquery.com/jquery-1.11.1.min.js');?>
 <?= $this->Html->script('Admin/plugins/jQuery/jquery-2.2.3.min.js');?>
 <?= $this->Html->script('Admin/bootstrap/js/bootstrap.min.js');?>
 <?= $this->Html->script('Admin/plugins/iCheck/icheck.min.js');?>
 <?= $this->Html->script('Admin/plugins/fastclick/fastclick.js');?>
 <?= $this->Html->script('Admin/dist/js/app.min.js');?>
 <?= $this->Html->script('Admin/dist/js/demo.js');?>
 <script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','#account_activate',function(){
   
    var employesid = $(this).attr("recordid");
     $.ajax({
            type: "POST",
            url: "activeemployes",
            //data: "orderby=" + sortdata+ "status=" + status,
            data: ({id:employesid}),
            dataType: "json",
            cache: false,
            success: function(response_data) {
           // alert(response_data['response']);
            var response = response_data['response']; 
            location.reload();

              }
          })



  });
  $(document).on('click','#product_status',function(){
    var productid = $(this).attr("productid");
     $.ajax({
            type: "POST",
            url: "productstatus",
            //data: "orderby=" + sortdata+ "status=" + status,
            data: ({id:productid}),
            dataType: "json",
            cache: false,
            success: function(response_data) {
           // alert(response_data['response']);
            var response = response_data['response']; 
            location.reload();
              }
          })
  });


});

</script>
</body>
</html>
