<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manthan</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<!--    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>-->
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
    echo link_tag('assets/css/circle.css');
    echo link_tag('assets/css/profile.css');
    ?>
    <style type="text/css">
        span.welcome-name{
            display: inline-block;
            margin: 0 1px;
            vertical-align: top;
            min-width: 50px;
            color: #fff;
        }
    </style>
</head>
<body>
<div id="output"></div>
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
            <a href="<?php echo base_url('profile'); ?>">
                Manthan
            </a>
        </li>
        <li class="logo pull-right pull-right-margine">
            <ul class="top-menu top-menu-logo">
                <li class="">
                    <span>Welcome&nbsp;:&nbsp;</span>&nbsp;<span class="span-auth-name welcome-name"></span>
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
                    <img src="<?php echo base_url('image/upload/w_400/'.$author_id);?>" alt="">
                </div>
                <div class="profile-info">
                    <span class="span-auth-name"></span>
                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </a>
            <ul class="main-menu">
                <li class="active">
                    <a href="<?php echo base_url('profile');?>"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url('logout');?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li><a href="<?php echo base_url('ebook-mng?tab=ebook'); ?>"><i class="fa fa-book"></i> E-Book Management</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=composition'); ?>"><i class="fa fa-file-word-o"></i> Composition</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=ebook_list'); ?>"><i class="fa fa-list"></i> List of Uploaded Books</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=composition_list'); ?>"><i class="fa fa-list"></i> List of Uploaded Composition</a></li>
            <li id="a_top_authors"><a href="<?php echo base_url('ebook-mng?tab=top_authors'); ?>"> <i class="fa fa-users"></i> List of Top 10 Authors</a></li>
            <li id="a_event"><a href="<?php echo base_url('ebook-mng?tab=event'); ?>"><i class="fa fa-bell"></i> Event Management</a></li>
            <li id="a_show_case"><a href="<?php echo base_url('ebook-mng?tab=show_case'); ?>"><i class="fa fa-book"></i> Books Show Case </a></li>
        </ul>
    </aside>
    <section id="content">
        <div class="container">

            <div class="block-header">
            </div>

            <div class="card" id="profile-main">
                <div class="pm-overview c-overflow">
                    <div class="pmo-pic">
                        <div class="p-relative ">
                            <a href="" class="">
                                <?php
                                    $url = 'assets/uploads/authors-images/author-'.$author_id.'.jpg';
                                    if(file_exists($url)) {
                                ?>
                                        <img id="profile_image" class="img-responsive" src="<?php echo base_url('image/upload/w_400/'.$author_id);?>" alt="" />
                                <?php
                                    }
                                    else {
                                ?>
                                        <img id="profile_image" class="img-responsive" src="assets/img/profile-pics/no-image-1.jpg" alt="" />
                                <?php
                                    }
                                ?>

                            </a>
                            <div class="dropdown pmop-message">
                                <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1">
                                    <i class="zmdi zmdi-comment-text-alt"></i>
                                </a>
                            </div>
                            <a href="" class="pmop-edit">
                                <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Add Profile Picture</span>
                                <form class="form-image-upload" action="<?php echo base_url('profile-image-2'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                    <input style="opacity: 0; width: 100%; " type="file" name="profileImage" id="profileImage" />
                                </form>
                            </a>
                            <div class="uploading-progress-div hidden">
                                <div class="uploading-div-wrapper">
                                    <div class="dis-mid">
                                        <div class="c100 p0 small orange custom-progress">
                                            <span>0%</span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pmo-stat">
                        </div>
                        <div class="pmo-block pmo-contact hidden-xs">
                            <ul>
                                <li><i class="zmdi zmdi-email"></i><span id="author_email"></span></li>
                                <li><i class="zmdi zmdi-phone"></i><span id="author_mobile"></span></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--========================================================================================================================================-->
                <div class="pm-body clearfix" role="tabpanel">
                    <div class="pmbb-body p-1-30 pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-account m-r-5"></i> Profile Information</h2>

                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a data-pmb-action="edit" id="edit-auth-profile" href="">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-profile">
                                        <li>
                                            <div class="checkbox m-b-15 pull-left">
                                                <label><i class="fa fa-cog"></i>
                                                    Privacy Settings
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox m-b-15 pull-left li-pd-left">
                                                <label>
                                                    <input type="checkbox" id="hide_img_chk" value="">
                                                    <i class="input-helper"></i>
                                                    Hide Image for viewer
                                                </label>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="checkbox m-b-15 pull-left li-pd-left">
                                                <label>
                                                    <input type="checkbox" id="hide_phn_chk" value="">
                                                    <i class="input-helper"></i>
                                                    Hide Contact for viewer
                                                </label>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="checkbox m-b-15 pull-left li-pd-left">
                                                <label>
                                                    <input type="checkbox" id="hide_email_chk" value="">
                                                    <i class="input-helper"></i>
                                                    Hide Email for viewer
                                                </label>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="checkbox m-b-15 pull-left li-pd-left">
                                                <label>
                                                    <input type="checkbox" id="hide_add_chk" value="">
                                                    <i class="input-helper"></i>
                                                    Hide Address for viewer
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-edit" id="profile_view">
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>Name*</dt>
                                    <dd><span class="span-auth-name"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>Name (Hindi)</dt>
                                    <dd><span class="span-auth-hindi-name"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>Address</dt>
                                    <dd><span id="span-auth-address"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>City</dt>
                                    <dd><span id="span-auth-city"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>Date of Birth</dt>
                                    <dd><span id="span-auth-dob"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>PAN Number*</dt>
                                    <dd><span id="span-auth-pan"></span></dd>
                                </dl>
                                <dl class="dl-horizontal dl-horizontals">
                                    <dt>About yourself</dt>
                                    <dd><span id="span-auth-about"></span></dd>
                                </dl>
                            </div>

                            <form id="form_profile_update">
                                <div class="pmbb-view" id="profile_editable">
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Name*</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <div class="pos-relative">
                                                    <input type="hidden" value="<?php echo $remember_token; ?>" name="remember_token" id="remember_token">
                                                    <input type="hidden" value="<?php echo $author_id; ?>" name="author_id" id="author_id">
                                                    <input type="text" value="" autocomplete="off" class="form-control" name="author_name" id="author_name" placeholder="eg. Mallinda Hollaway">
                                                    <span class="error-span" data-error-for="author_name"></span>
                                                </div>
                                            </div>

                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Name (Hindi)</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <div class="pos-relative">
                                                    <input type="text" value="" autocomplete="off" class="form-control" name="author_hindi_name" id="author_hindi_name" placeholder="eg. Mallinda Hollaway">
                                                    <span class="error-span" data-error-for="author_hindi_name"></span>
                                                </div>
                                            </div>

                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Address</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <div class="pos-relative">
                                                    <textarea class="form-control" rows="2" name="author_address" id="author_address" placeholder="Address"></textarea>
                                                    <span class="error-span" data-error-for="author_address"></span>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">City</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <div class="pos-relative">
                                                    <input type="text" class="form-control" name="author_city" id="author_city" placeholder="eg. Udaipur">
                                                    <span class="error-span" data-error-for="author_city"></span>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">Date of Birth</dt>
                                        <dd>
                                            <div class="pos-relative">
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type='text' class="form-control date-picker" name="author_dob" id="author_dob" data-toggle="dropdown" placeholder="Click here...">
                                                </div>
                                                <span class="error-span" data-error-for="author_dob"></span>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">PAN Number*</dt>
                                        <dd>
                                            <div class="pos-relative">
                                                <input type="text" class="form-control" name="author_pan_card" id="author_pan_card" placeholder="Pan Number">
                                                <span class="error-span" data-error-for="author_pan_card"></span>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10">About yourself</dt>
                                        <dd>
                                            <div class="fg-line">
                                                <div class="pos-relative">
                                                    <textarea class="form-control" rows="7" name="author_about_yourself" id="author_about_yourself" placeholder="About your self"></textarea>
                                                    <span class="error-span" data-error-for="author_about_yourself"></span>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt class="p-t-10"></dt>
                                        <dd>
                                            <div class="fg-line">
                                                <button class="btn btn-primary btn-sm " type="submit" name="btn_update_profile" id="btn_update_profile">Save Info &nbsp;<i class="fa fa-save"></i></button>
                                                <button data-pmb-action="reset" class="btn btn-link btn-sm" id="btn-cancel-edit-pro">Cancel</button>
                                            </div>
                                        </dd>
                                    </dl>
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
    Copyright &copy; 2015 Manthan

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
echo script_tag('assets/js/jquery.form.min.js');
echo script_tag('assets/js/jquery.validate.min.js');
echo script_tag('assets/js/profile/profile.js');
?>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        new MBJS.UserProfile("<?php echo base_url(); ?>");
    });
</script>
</html>