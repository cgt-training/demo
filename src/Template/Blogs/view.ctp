<h1>Blog Posts</h1>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  	<?php if(!empty($blogs)) {
  		foreach ($blogs as  $result) {
  			# code...
  		
  		?>
    <tr>
      <th scope="row"><?php echo $result->id; ?></th>
      <td><?php echo $result->title ?></td>
      <td><?php echo $result->description; ?></td>
      <td><?= $this->Html->link('Edit', ['action' => 'edit', $result->id]) ?></td>
	  <td>
<?= $this->Form->postLink(
	  "delete",
   	['action' => 'delete', $result->id],
    ['confirm' => 'Are you sure?'])
?>

</td>
    </tr>
    <?php } } ?>
   
  </tbody>
</table>


		</div>
	</div>
    <!--<?php if(!empty($blogs)): foreach($blogs as $blog): ?>
    <div class="post-box">
        <div class="post-content">
            <div class="caption">
                <h4><a href="javascript:void(0);"><?php echo $blog->title; ?></a></h4>
                <p><?php echo $blog->description; ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; else: ?>
    <p class="no-record">No post(s) found......</p>
    <?php endif; ?>---->.


</div>