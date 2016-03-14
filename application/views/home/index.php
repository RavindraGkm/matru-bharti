<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manthan</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <?php
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/bootstrap-datetimepicker.min.css');
    echo link_tag('assets/css/animate.min.css');
    echo link_tag('assets/css/sweet-alert.css');
    echo link_tag('assets/css/material-design-iconic-font.min.css');
    echo link_tag('assets/css/jquery.mCustomScrollbar.min.css');
    echo link_tag('assets/css/jquery.bootgrid.min.css');
    echo link_tag('assets/css/app.min.1.css');
    echo link_tag('assets/css/app.min.2.css');
    echo link_tag('assets/css/font-awesome.min.css');
    echo link_tag('assets/css/bootstrap-select.css');
    echo link_tag('assets/css/ebook.css');
    ?>
    <style type="text/css">
        .menu-trigger-guest {
            width: 65px;
            height: 35px;
        }

        @font-face {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
<header id="header" class="clearfix" data-current-skin="blue">
    <ul class="header-inner">
        <li class="menu-trigger-guest" >

        </li>
        <li class="logo hidden-xs">
            <a href="<?php echo base_url(); ?>">
                Manthan
            </a>
        </li>
        <li class="pull-right pull-right-margine">
            <ul class="top-menu">
                <li>
                    <a class="" href="<?php echo base_url();?>"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li>
                    <a class="home-nav-link" href="<?php echo base_url('home?page=ebook_gallery');?>">E-Books</a>
                </li>
                <li>
                    <a class="home-nav-link" href="<?php echo base_url('home?page=show_case');?>">Books Show Case</a>
                </li>
                <li>
                    <a class="home-nav-link" href="<?php echo base_url('#section_contact_us');?>">Contact Us</a>
                </li>
                <li>
                    <a class="home-nav-link" href="<?php echo base_url('about-us');?>">About Us</a>
                </li>
                <li>

                </li>
                <li class="">
                    <span>Welcome&nbsp;:&nbsp;</span>&nbsp;<span class="span-auth-name welcome-name">Guest</span>
                </li>
            </ul>
        </li>
    </ul>
</header>
<section id="main">
    <div id="content">
        <div class="container">
            <div class="card col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="profile-main">
                <input type="hidden" value="<?php echo $active_tab; ?>" id="active_tab_val"/>
                <ul class="tab-nav" role="tablist">
                    <li role="presentation" id="tab_ebook_gallery">
                        <a href="#ebook_gallery" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-image fa-lg"></i>&nbsp;&nbsp;&nbsp;E-Books Gallery
                        </a>
                    </li>
                    <li role="presentation" id="tab_show_case">
                        <a href="#show_case" aria-controls="show_case" role="tab" data-toggle="tab">
                            <i class="fa fa-image fa-lg"></i>&nbsp;&nbsp;&nbsp;Books Show Case Gallery
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook_gallery">
                        <div class="card-body card-padding">
                            <div class="lightbox photos" id="div_ebook_gallery">

                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane pmb-block" id="show_case">
                        <div class="card-body card-padding">
                            <div class="lightbox photos" id="div_book_show_case_gallery">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    Copyright &copy; 2016 Manthan

    <ul class="f-menu">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?php echo base_url('#section_contact_us');?>">Contact</a></li>
        <li><a href="<?php echo base_url('home?page=ebook_gallery');?>">Ebooks</a></li>
        <li><a href="<?php echo base_url('home?page=show_case');?>">Show Case</a></li>
        <li><a href="<?php echo base_url('home?page=show_case');?>">About Us</a></li>
        <li><a href="<?php echo base_url('terms-conditions');?>">Terms &amp; Conditions</a></li>
    </ul>
</footer>

Page Loader
<div class="page-loader">
    <div class="preloader pls-blue">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20"/>
        </svg>

        <p>Please wait...</p>
    </div>
</div>

<?php
echo script_tag('assets/js/jquery.js');
echo script_tag('assets/js/bootstrap.min.js');
echo script_tag('assets/js/jquery.mCustomScrollbar.concat.min.js');
echo script_tag('assets/js/waves.min.js');
echo script_tag('assets/js/bootstrap-growl.min.js');
echo script_tag('assets/js/sweet-alert.min.js');
echo script_tag('assets/js/moment.min.js');
echo script_tag('assets/js/bootstrap-datetimepicker.min.js');
echo script_tag('assets/js/functions.js');
echo script_tag('assets/js/home/home.js');
echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
echo script_tag('assets/js/lightGallery.min.js');
?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        new MBJS.Home("<?php echo base_url(); ?>");
    });
</script>
