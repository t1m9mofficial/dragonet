<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="ISP Management System">
    <meta name="keywords" content="isp, internet, management, billing">
    <meta name="author" content="Techynaf">
    <title><?php echo $this->db->get_where('setting', array('name' => 'title'))->row()->content; ?></title>
    <link rel="icon" type="image/*" href="<?php echo base_url(); ?>assets/app/img/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap CSS-->
    <?php include 'includes_top.php'; ?>
</head>

<body class="aside-user">
    <!-- START Main wrapper-->
    <div class="wrapper">
        <?php include 'header.php'; ?>
         
        <?php include 'navbar.php'; ?>
         
        <?php // include 'right_sidebar.php'; ?>
        <!-- START Main section-->
        <section>
            <?php include $page_name . '.php'; ?>
        </section>
        <!-- END Main section-->

        <?php include 'modal.php'; ?>
    </div>
    <!-- END Main wrapper-->
    <?php include 'includes_bottom.php'; ?>
</body>

</html>

