<!DOCTYPE html>
<html lang="en">
<head> 
    <?= $this->element('adminhead') ?>
</head>
<body>
    <?= $this->element('adminheader') ?>
    <!-- Page Content -->
    <div id="content" class="container">
        <?= $this->Flash->render() ?>
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <?= $this->element('adminfooter') ?>
</body>
</html>