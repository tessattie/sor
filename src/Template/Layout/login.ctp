<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Sogebank S.A.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$title = 'CMSA - Clients';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?> -
        Login
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script("jquery-3.2.1.min.js") ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= ROOT_DIREC ?>/users/login" style='font-size:25px'>CMSA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




    <?= $this->Flash->render() ?>
    <div class="container-fluid clearfix">
        <?= $this->fetch('content') ?>
    </div>


     <!--Footer-->
      <footer class="page-footer font-small indigo pt-0" style="padding:15px 0px;background:#f2f2f2;border-top:1px solid #ddd;position:fixed;bottom:0; width:100%">
          <!--Copyright-->
          <div class="footer-copyright py-3">
              <div class="container-fluid">
                  © <?= date('Y') ?> Copyright Caribbean Supermarket S.A.</a>
              </div>
          </div>
          <!--/Copyright-->
      </footer>
      <!--/Footer-->
    <footer>
    </footer>
    <?= $this->Html->script("bootstrap.js") ?>
    <?= $this->Html->script("script.js") ?>
    <?= $this->Html->script("datatables.min.js") ?>
    <?= $this->Html->script("tables.js") ?>
    
</body>
</html>