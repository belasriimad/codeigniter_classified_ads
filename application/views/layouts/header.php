<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annonces.com</title>
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
        <a class="navbar-brand" href="<?php echo base_url();?>">Annonces.com</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home <span class="sr-only"></span></a></li>
            <?php if($this->session->userdata('logged')):?>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-user"></span> 
                        Account
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-1  col-xs-4">
                                        <p class="text-center">
                                            <?php echo $this->session->userdata("nom")." ".$this->session->userdata("prenom");?>
                                        </p>
                                        <p class="text-center small"><?php echo $this->session->userdata("email");?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-24 col-sm-24  col-xs-12">
                                            <p>
                                                <a href="<?php echo base_url()?>user/logout" class="btn btn-danger btn-block">Logout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php else:?>
                <li><a itemprop="url" href="<?php echo base_url();?>user/register"  title="Inscription"><i class="fa fa-users">&nbsp;Register</i></a></li>
                <li><a itemprop="url" href="<?php echo base_url();?>user/login"  title="Connexion"><i class="fa fa-lock">&nbsp;Login</i></a></li>
            <?php endif;?>
            <li><a href="<?php echo base_url();?>ads/add"><i class="fa fa-pencil"> New Ad</i></a></li>
           </li>
            <?php if($this->session->userdata('admin')):?>
                <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Admin</a></li>
            <?php endif;?>
        </ul>
        <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>ads/find">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
     </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
      