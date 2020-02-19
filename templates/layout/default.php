<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <!--[if lte IE 8]><?= $this->Html->script('ie/html5shiv') ?><![endif]-->
    <?= $this->Html->script(['jquery.min', 'jquery.dropotron', 'skel.min','skel-layers.min','init']) ?>
    <?= $this->Html->css(['skel', 'style', 'style-wide']) ?>
    <!--[if lte IE 8]><?= $this->Html->css('ie/v8') ?><![endif]-->
</head>

<body>
    <div class="wrapper style1">
        <?php echo $this->element('topbar'); ?>
        <?php echo $this->element('banner'); ?>
        <div id="extra">
            <div class="container">
                <?= $this->fetch('content'); ?>
            </div>
        </div>
    </div>

    <?php if ($this->Identity->isLoggedIn()): ?>
        <?php if($this->request->getParam('controller') === 'Pets' && $this->request->getParam('action')  === 'view'):?>
            <?php echo $this->element('question'); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($this->Identity->isLoggedIn()): ?>
        <?php if($this->request->getParam('controller') === 'RequestAdoptions' && $this->request->getParam('action')  === 'view'):?>
            <?php echo $this->element('adoption_message'); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $this->element('copyright'); ?>
</body>
</html>
