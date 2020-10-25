<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="ISP Management System">
    <meta name="keywords" content="isp, internet, management, billing">
    <meta name="author" content="Techynaf">
    <title>DragoNet | ISP Billing Management System</title>
    <link rel="icon" type="image/*" href="assets/app/img/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/bootstrap.css">
    <!-- Vendor CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/animo/animate+animo.css">
    <!-- App CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/common.css">
    <!-- Modernizr JS Script-->
    <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js" type="application/javascript"></script>
    <!-- FastClick for mobiles-->
    <script src="<?php echo base_url(); ?>assets/vendor/fastclick/fastclick.js" type="application/javascript"></script>
</head>

<body>
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10" style="margin: 15% 0">
            <div style="box-shadow: 0 0 5px 3px #888888" class="panel panel-dark panel-flat block-center">
                <div class="panel-heading text-center">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>assets/app/img/logo.png" alt="Image" class="block-center img-rounded">
                    </a>
                    <p class="text-center mt-lg">
                        <strong>SIGN IN TO CONTINUE</strong>
                    </p>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>auth/login/" class="mb-lg" method="post">
                        <div class="text-right mb-sm">
                            <!-- <a href="login.html#" class="text-muted">Need to Signup?</a> -->
                        </div>
                        <div class="form-group has-feedback">
                            <input autofocus id="email" name="email" type="email" placeholder="Enter email" class="form-control">
                            <span class="fa fa-envelope form-control-feedback text-muted"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control">
                            <span class="fa fa-lock form-control-feedback text-muted"></span>
                        </div>
                        <!-- <div class="clearfix">
                            <div class="checkbox c-checkbox pull-left mt0">
                                <label>
                                    <input type="checkbox" value="">
                                    <span class="fa fa-check"></span>Remember Me
                                </label>
                            </div>
                            <div class="pull-right"><a href="login.html#" class="text-muted">Forgot your password?</a>
                            </div>
                        </div> -->
                        <button style="margin-top: 33px" type="submit" class="btn btn-block btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- START Scripts-->
    <!-- Main vendor Scripts-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Animo-->
    <script src="<?php echo base_url(); ?>assets/vendor/animo/animo.min.js"></script>
    <!-- Custom script for pages-->
    <script src="<?php echo base_url(); ?>assets/app/js/pages.js"></script>
    <!-- END Scripts-->
</body>

</html>
