<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matru Bharti</title>
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
            <a href="<?php echo base_url('profile'); ?>">
                Matru Bharti
            </a>
        </li>
        <li class="pull-right pull-right-margine">
            <ul class="top-menu">
                <li class="">
                    <span>Welcome&nbsp;:&nbsp;</span>&nbsp;<span class="welcome-name">Admin</span>
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
                    <img src="<?php echo base_url('image/upload/w_400/' . $author_id); ?>" alt="">
                </div>
                <div class="profile-info">
                    <span class="">Admin</span>
                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </a>
            <ul class="main-menu">
                <li>
                    <a href="<?php echo base_url('profile'); ?>"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url('logout');?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=ebook_list'); ?>"> <i class="fa fa-list"></i> List of
                    Uploaded Books</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=composition_list'); ?>" id="li_tab_url"> <i class="fa fa-list"></i> List of
                    Uploaded Composition</a>
            </li>
        </ul>
    </aside>
    <div id="content">
        <div class="container">

            <div class="block-header col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <h2 id="h2_name"></h2>
            </div>

            <div class="card col col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12" id="profile-main">
                <input type="hidden" value="<?php echo $active_tab; ?>" id="active_tab_val"/>
                <ul class="tab-nav" role="tablist">
                    <li role="presentation" id="tab_ebook_list">
                        <a href="#ebook_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;&nbsp;List of E-Book Files
                        </a>
                    </li>
                    <li role="presentation" id="tab_composition_list">
                        <a href="#composition_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;&nbsp;List of Composition Files
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <input type="hidden" value="<?php echo $remember_token; ?>" name="remember_token" id="remember_token">
                    <input type="hidden" value="<?php echo $author_id; ?>" name="author_id" id="author_id">
                    <?php
                        $current_date= date('Y-m-d');
                    ?>
                    <input type="hidden" value="<?php echo $current_date; ?>" name="publish_date" id="publish_date">

                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="file_title">File Title</th>
                                        <th data-column-id="file_published_status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="file_attachment" data-formatter="links">File Attachment</th>
                                        <th data-column-id="action"  data-formatter="approvel">Is Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ebook_list_info">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="composition_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-composition" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="file-title">File Title</th>
                                        <th data-column-id="about_composition" data-formatter="links">Composition</th>
                                        <th data-column-id="file_published_status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="action" data-formatter="approvel">Is Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody id="composition_list_info"></tbody>
                                </table>
                                <div class="popover fade bottom in composition_more_desctiption" id="popover288972" role="tooltip" style="top: 671px;left: 53.6406px; display: block;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    Copyright &copy; 2016 Matru Bharti

    <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
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
echo script_tag('assets/js/functions.js');
echo script_tag('assets/js/bootstrap-select.js');
echo script_tag('assets/js/fileinput.min.js');
echo script_tag('assets/js/jquery.validate.min.js');
echo script_tag('assets/js/admin/admin-mng-ctrl.js');
echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        new MBJS.AdminControlPanel("<?php echo base_url(); ?>");
    });
</script>
