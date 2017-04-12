<h1>Add Blog Post</h1>
<?php
    echo $this->Form->create($post,['type' => 'file']);
   echo $this->Form->input('title');
   echo $this->Form->control('description', [
    'label' => [
        'class' => 'thingy',
        'text' => 'Description'
    ]
]);
    
    echo $this->Form->control('published', ['type' => 'checkbox']);
$sizes = ['s' => 'Small', 'm' => 'Medium', 'l' => 'Large'];
echo $this->Form->select('size', $sizes, ['default' => 'm']);
echo $this->Form->radio('gender', ['Male','Female']);
    echo $this->Form->button(__('Save Blog'));
    echo $this->Form->end();
?>