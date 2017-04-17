<!DOCTYPE html>
<html lang="en">
<head> 
    <?= $this->element('adminhead') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?= $this->element('dashboardheader') ?>
    <?= $this->element('dashboardsidebar') ?>
    <!-- Page Content -->
    <div class="content-wrapper">
        <?= $this->Flash->render() ?>
        <div class="" style="padding:15px;">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <?= $this->element('dashboardfooter') ?>
</body>
</html>