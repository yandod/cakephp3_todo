<!DOCTYPE html>
<html>
<head>
    <title>Getting Things Done with Engine Yard Cloud</title>
    <?= $this->fetch('meta') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('application.css') ?>
    <?= $this->Html->script('application.js') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div id="all">
    <div id="header">
        <div id="logo">
            <a href="http://www.engineyard.com">Engine Yard</a>
        </div>
        <h1><span class="intro">Getting Things Done</span> deployed on <span class="branding">Engine Yard Cloud</span></h1>
        <p class="sample">Sample Deployment Application</p>
    </div>
    <div id="content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <div id="foot">
        <div class="copyright">
            <p>
                Running on Engine Yard: <a href="http://engineyard.com/products/appcloud">The Ruby Cloud</a> and <a href="http://cakephp.org/">CakePHP3</a><br>
                PHP is the Language of the Cloud.<br>
                Copyright © Engine Yard, Inc. All rights reserved.
            </p>
        </div>
    </div>
</div>
</body>
</html>
