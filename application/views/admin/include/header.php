<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title>ArkAdmin Theme</title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo/favicon_32x32.png" />
        
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>scripts/vendor/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" />
        <!--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />-->
        <link href="<?php echo base_url(); ?>scripts/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"  />
        <link href="<?php echo base_url(); ?>scripts/vendor/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/select2/select2-bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/jquery.uniform/themes/default/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/css/prettify.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/vendor/fullcalendar/dist/fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>scripts/vendor/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>scripts/css/ark.css" rel="stylesheet" type="text/css" />

        <!-- Remove this line on production-->
        <link href="<?php echo base_url(); ?>scripts/css/examples.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>scripts/vendor/jquery/dist/jquery.min.js"></script>

    </head>
    
    <body class="cover">

        <div class="wrapper container">
           

            <!-- HEAD NAV -->
            <div class="navbar navbar-default navbar-static-top navbar-main" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <img src="<?php echo base_url(); ?>img/logo/default_90x32.png" alt="Ark">
                    </a>
                </div>
                

                <ul class="nav navbar-nav navbar-left main-nav">
                    <li class="">
                        <a href="<?php echo base_url(); ?>" class="" data-toggle="collapse" data-target=".sidebar">
                            Dashboard
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>account" class="" data-toggle="collapse" data-target=".sidebar">
                            Accounts
                        </a>
                    </li>

                    <li class="">
                        <a href="#" class="" data-toggle="collapse" data-target=".sidebar">
                            Inventory
                        </a>
                    </li>

                    <li class="">
                        <a href="#" class="" data-toggle="collapse" data-target=".sidebar">
                            Billing
                        </a>
                    </li>

                    <li class="">
                        <a href="#" class="" data-toggle="collapse" data-target=".sidebar">
                            Support
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>ticket" class="" data-toggle="collapse" data-target=".sidebar">
                            Ticket
                        </a>
                    </li>
                   
                </ul>

                


                <ul class="nav navbar-nav navbar-right">
                    <form  class="form-horizontal" action="<?php echo base_url(); ?>account/search" method="GET" role="form" style="padding:15px; float:left;">
                        <div class="form-group" style="margin-bottom:0px;">
                                <input type="text" name="q"  class="form-control" style="height: 25px; width:110px;" placeholder="@username">
                                <span id="filter-count"></span>
                          
                        </div>
                        
                    </form>

                    <li class="visible-xs">
                        <a href="#" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar pull-right" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>img/users/blank.jpg" alt="mike" class="img-avatar" />
                            <span class="hidden-small">
                            <?php echo $this->session->userdata('email'); ?>
                            <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu pull-right">

                            <?php
                            
                                if ($this->ion_auth->is_admin()) :
                            ?>  
                                <li><a href="#"><i class="fa fa-gear"></i>Site Settings</a></li>
                            <?php
                                endif;
                            ?>
                          
                            <li><a href="#"><i class="fa fa-gear"></i>Account Settings</a></li>
                            <li><a href="profile.html"><i class="fa fa-user"></i>View Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- END: HEAD NAV -->



            <!-- BODY -->
            <div class="body">