<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">CI Project Tracker</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo base_url();?>index.php/users/register">Register</a></li>
                    <li><a href="<?php echo base_url();?>index.php/project/index">Projects</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if ($this->session->userdata('logged_in')){
                            echo "<li><a href=" . base_url() . "index.php/users/logout><span class='glyphicon glyphicon-log-out'></span>Logout</a></li>";
                        } else{}
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <?php $this->load->view('users/login_view'); ?>
            </div>
            <div class="col-xs-9">
                <?php $this->load->view($main_view); ?>
            </div>
        </div>
        
    </div>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
