<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CMSA';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?> -
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script("jquery-3.2.1.min.js") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="notLogin">
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
      <a class="navbar-brand" href="#">CMSA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li <?= (!empty($this->request->params['controller']) && $this->request->params['controller'] == 'Users') ? 'class="active"' : '' ?>><a href="<?= ROOT_DIREC ?>/users"><span class="glyphicon glyphicon-user"></span> Utilisteurs <span class="sr-only">(current)</span></a></li>

        <li <?= (!empty($this->request->params['controller']) && $this->request->params['controller'] == 'Customers' && $this->request->params['action'] == 'index') ? 'class="active"' : '' ?>><a href="<?= ROOT_DIREC ?>/customers"><span class="glyphicon glyphicon-user"></span> Clients <span class="sr-only"></span></a></li>
        
        <li <?= (!empty($this->request->params['controller']) && $this->request->params['controller'] == 'Customers' && $this->request->params['action'] == 'add') ? 'class="active"' : '' 
        ?>><a href="<?= ROOT_DIREC ?>/customers/add"><span class="glyphicon glyphicon-plus"></span> Nouveau Client</a></li>        
      </ul>
      <form class="form-inline my-2 my-lg-0" style = "width: 48%;
                                                      float: left;
                                                      margin-left: 59px;
                                                      margin-top: 8px;" action="<?= ROOT_DIREC ?>/customers/search" method='POST'>
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $name ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= ROOT_DIREC ?>/users/edit/<?= $current_user['id'] ?>"><span class="glyphicon glyphicon-cog"></span> Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= ROOT_DIREC ?>/users/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <?= $this->Flash->render() ?>
    <div class="container-fluid clearfix" style = "padding-bottom:40px;width:90%;margin-top:20px">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>

<?php if($current_user['first_login'] == 1) 
        {
            echo "<script> $(document).ready(function(){
                $('#firstLogin').modal('show');
            }) </script>";
        }
?>

<div class="modal fade" id="firstLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">First Login Password Change</h5>
      </div>
      <?= $this->Form->create('', array('url' => '/users/firstLogin')) ?>
      <div class="modal-body">
        <?= $this->Form->input('id', array('value' => $current_user['id'], 'type' => 'hidden', 'name' => 'id')); ?>
        <div class="row">
          <div class="col-md-4"><label class="modallabel">Password :</label></div>
          <div class="col-md-8"><?= $this->Form->input('password', array('class' => "form-control", "label" => false, "placeholder" => "Password", "autocomplete" => "new-password", 'type' => 'password')); ?></div>
          </div>
          <div class="row">
              <div class="col-md-4"><label class="modallabel">Confirm Password :</label></div>
              <div class="col-md-8"><?= $this->Form->input('confirm_password', array('class' => "form-control", "label" => false, "placeholder" => "Confirm Password", "type" => "password", 'type' => 'password')); ?></div>
          </div>
      </div>
      <div class="modal-footer">
        <?= $this->Form->button(__('Submit'), array('class' => "btn btn-success")); ?>  
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
<!--Footer-->
      <footer class="page-footer font-small indigo pt-0" style="padding:15px 0px;background:#f2f2f2;border-top:1px solid #ddd;position:fixed;bottom:0; width:100%">
          <!--Copyright-->
          <div class="footer-copyright py-3 text-center">
              <div class="container-fluid">
                  © <?= date('Y') ?> Copyright Caribbean Supermarket S.A.</a>
              </div>
          </div>
          <!--/Copyright-->
      </footer>
      <!--/Footer-->
    <?= $this->Html->script("bootstrap.js") ?>
    <?= $this->Html->script("script.js") ?>
    <?= $this->Html->script("datatables.min.js") ?>
    
</body>
</html>
