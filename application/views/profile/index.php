<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Martu Bharti</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <?php
    echo link_tag('assets/css/bootstrap-datetimepicker.min.css');
    echo link_tag('assets/css/animate.min.css');
    echo link_tag('assets/css/sweet-alert.css');
    echo link_tag('assets/css/material-design-iconic-font.min.css');
    echo link_tag('assets/css/jquery.mCustomScrollbar.min.css ');
    echo link_tag('assets/css/app.min.1.css');
    echo link_tag('assets/css/app.min.2.css');
    echo link_tag('assets/css/lightGallery.css');
    echo link_tag('assets/css/font-awesome.css');
    echo link_tag('assets/css/font-awesome.min.css');
    ?>
    <style type="text/css">
        @font-face {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body>
<header id="header" class="clearfix" data-current-skin="blue">
    <ul class="header-inner">
        <li id="menu-trigger" data-trigger="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>
        <li class="logo hidden-xs">
            <a href="<?php echo base_url('ebook'); ?>">
                Martu Bharti
            </a>
        </li>
        <li class="pull-right pull-right-margine">
            <ul class="top-menu">
                <li class="">
                    <i class="tm-icon zmdi zmdi-account"></i>
                    Welcome Dilip Lohar
                </li>
            </ul>
        </li>
    </ul>
</header>
<section id="main">
    <aside id="sidebar" class="sidebar c-overflow">
        <div class="profile-menu">
            <a href="">
                <div class="profile-pic">
                    <img src="<?php echo base_url('assets/img/profile-pics/1.jpg');?>" alt="">
                </div>
                <div class="profile-info">
                    Malinda Hollaway
                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </a>
            <ul class="main-menu">
                <li>
                    <a href="<?php echo base_url('view-profiles');?>"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li><a href="<?php echo base_url('ebook'); ?>"><i class="fa fa-book"></i> E-Book Management</a></li>
            <li><a href="<?php echo base_url('register'); ?>"><i class="zmdi zmdi-account-add"></i> Register</a></li>
        </ul>
    </aside>
    <section id="content">
        <div class="container">

            <div class="block-header">
                <h2>Malinda Hollaway <small></small></h2>
            </div>

            <div class="card" id="profile-main">
                <div class="pm-overview c-overflow">
                    <div class="pmo-pic">
                        <div class="p-relative">
                            <a href="">
                                <img class="img-responsive" src="<?php echo base_url('assets/img/profile-pics/profile-pic-2.jpg');?>" alt="">
                            </a>

                            <div class="dropdown pmop-message">
                                <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                    <i class="zmdi zmdi-comment-text-alt"></i>
                                </a>

                                <div class="dropdown-menu">
<!--                                    <textarea placeholder="Write something..."></textarea>-->

<!--                                    <button class="btn bgm-green btn-float"><i class="zmdi zmdi-mail-send"></i></button>-->
                                </div>
                            </div>

                            <a href="" class="pmop-edit">
                                <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Add Profile Picture</span>
                                <input type="file" class="from-control">
                            </a>
                        </div>
                        <div class="pmo-stat">

                        </div>
                        <div class="pmo-block pmo-contact hidden-xs">
                            <ul>
                                <li><i class="zmdi zmdi-email"></i> malinda-h@gmail.com</li>
                                <li><i class="zmdi zmdi-phone"></i> 00971 12345678 9</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--========================================================================================================================================-->
                <div class="pm-body clearfix" role="tabpanel">
                    <div class="pmbb-body p-1-30 pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-account m-r-5"></i> Edit Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-pmb-action="edit" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                    <dt>Name*</dt>
                                    <dd>Mallinda Hollaway</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Email</dt>
                                    <dd>abc@gmail.com</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Mobile</dt>
                                    <dd>988 232 1990</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Address</dt>
                                    <dd>134 Shivaji Nagar <br><br> Near Udaipole Bus Stand <br><br> Udaipur (Rajasthan)</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>City</dt>
                                    <dd>Udaipur (Raj.)</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Date of Birth</dt>
                                    <dd>26/01/1986</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>About yourself</dt>
                                    <dd>Non manglik AsHAS <br><br> SDGC s sd  isd dsn </dd>
                                </dl>
                            </div>

                            <form id="form_profile_update">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Name*</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="hidden" value="<?php echo $remember_token; ?>" class="form-control" name="remember_token" id="remember_token">
                                                <input type="text" value="<?php echo $remember_token; ?>" autocomplete="off" class="form-control" name="txt_name" id="txt_name" placeholder="eg. Mallinda Hollaway">
                                            </div>

                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Email*</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control" autocomplete="off" name="txt_email" id="txt_email" placeholder="eg. abc@gmail.com">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Mobile*</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control" autocomplete="off" name="txt_mobile" id="txt_mobile" placeholder="988 455 3009">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Address</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <textarea class="form-control" rows="2" name="txt_address" id="txt_address" placeholder="Address"></textarea>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">City</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <input type="text" class="form-control" name="txt_city" id="txt_city" placeholder="eg. Udaipur">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Date of Birth</dt>
                                        <dd>
                                            <div class="dtp-container dropdown fg-line">
                                                <input type='text' class="form-control date-picker" name="txt_dob" id="txt_dob" data-toggle="dropdown" placeholder="Click here...">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">About yourself</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <textarea class="form-control" rows="5" name="txt_about_yourself" id="txt_about_yourself" placeholder="About your self"></textarea>
                                            </div>
                                        </dd>
                                    </dl>

                                    <div class="m-t-30">
                                        <button class="btn btn-primary btn-sm" type="submit" name="btn-update-profile" id="btn-update-profile">Save</button>
                                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--========================================================================================================================================-->
            </div>
        </div>
    </section>
</section>

<footer id="footer">
    Copyright &copy; 2015 Matru Bharti

    <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</footer>

<!-- Page Loader -->
<div class="page-loader">
    <div class="preloader pls-blue">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
        </svg>

        <p>Please wait...</p>
    </div>
</div>

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1 class="c-white">Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">

    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<!-- Javascript Libraries -->
<?php
echo script_tag('assets/js/jquery.js');
echo script_tag('assets/js/jquery.min.js');
echo script_tag('assets/js/bootstrap.min.js');
echo script_tag('assets/js/jquery.mCustomScrollbar.concat.min.js');
echo script_tag('assets/js/waves.min.js');
echo script_tag('assets/js/bootstrap-growl.min.js');
echo script_tag('assets/js/sweet-alert.min.js');
echo script_tag('assets/js/moment.min.js');
echo script_tag('assets/js/bootstrap-datetimepicker.min.js');
echo script_tag('assets/js/functions.js');
echo script_tag('assets/js/demo.js');
echo script_tag('assets/js/jquery.validate.min.js');
echo script_tag('assets/js/profile/profile.js');
?>
<!--<![endif]-->-->
</body>
<script type="text/javascript">
    $(document).ready(function(){
        new MBJS.UserProfile("<?php echo base_url(); ?>");
    })
</script>
</html>