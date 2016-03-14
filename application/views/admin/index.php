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
    echo link_tag('assets/css/lightGallery.css');
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
            <a href="<?php echo base_url('admin-book-mng?tab=ebook_list'); ?>">
                Manthan
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
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=authors_list'); ?>" id="li_tab_url"> <i class="fa fa-list"></i> List of Authors</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=event_list'); ?>" id="li_tab_url"> <i class="fa fa-list"></i> List of Events</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=show_case_list'); ?>" id="li_tab_url"> <i class="fa fa-list"></i> List of Books Show Case</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=show_case_gallery'); ?>" id="li_tab_url"> <i class="fa fa-image"></i> Books Show Case Gallery</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin-book-mng?tab=control_panel'); ?>" id="li_tab_url"> <i class="fa fa-cogs"></i> Control Panel</a>
            </li>
        </ul>
    </aside>
    <div id="content">
        <div class="container">

            <div class="block-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 id="h2_name"></h2>
            </div>

            <div class="card col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="profile-main">
                <input type="hidden" value="<?php echo $active_tab; ?>" id="active_tab_val"/>
                <ul class="tab-nav" role="tablist">
                    <li role="presentation" id="tab_ebook_list">
                        <a href="#ebook_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;E-Books List
                        </a>
                    </li>
                    <li role="presentation" id="tab_composition_list">
                        <a href="#composition_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;Compositions List
                        </a>
                    </li>
                    <li role="presentation" id="tab_authors_list">
                        <a href="#authors_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;Authors List
                        </a>
                    </li>
                    <li role="presentation" id="tab_event_list">
                        <a href="#event_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;Events List
                        </a>
                    </li>
                    <li role="presentation" id="tab_show_case_list">
                        <a href="#show_case_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-list fa-lg"></i>&nbsp;Show Case List
                        </a>
                    </li>
                    <li role="presentation" id="tab_show_case_gallery">
                        <a href="#show_case_gallery" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-image fa-lg"></i>&nbsp;Show Case Gallery
                        </a>
                    </li>
                    <li role="presentation" id="tab_control_panel">
                        <a href="#control_panel" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-cogs fa-lg"></i>&nbsp;Control Panel
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <input type="hidden" value="<?php echo $remember_token; ?>" name="remember_token" id="remember_token">
                    <input type="hidden" value="<?php echo $author_id; ?>" name="author_id" id="author_id">

                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="serial_no">S.No.</th>
                                        <th data-column-id="file_title">File Title</th>
                                        <th data-column-id="file_author">Author Name</th>
                                        <th data-column-id="file_published_status">Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="file_downloads" data-formatter="downloads">Downloads</th>
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
                                        <th data-column-id="serial_no">S.No.</th>
                                        <th data-column-id="file-title">File Title</th>
                                        <th data-column-id="about_composition" data-formatter="links">Composition</th>
                                        <th data-column-id="file-author">Author Name</th>
                                        <th data-column-id="file_published_status">Published Status</th>
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
                    <div role="tabpanel" class="tab-pane pmb-block" id="authors_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-authors" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="serial_no">S.No.</th>
                                        <th data-column-id="author_image" data-formatter="author_image">Author Image</th>
                                        <th data-column-id="author_name">Name</th>
                                        <th data-column-id="author_address">Address</th>
                                        <th data-column-id="author_city">City</th>
                                        <th data-column-id="author_contact">Contact</th>
                                        <th data-column-id="author_ebook">Ebooks</th>
                                        <th data-column-id="author_ebook_download">Ebook Downloads</th>
                                        <th data-column-id="author_composition">Compositions</th>
                                        <th data-column-id="author_compos_download">Composition Seen</i></th>
                                        <th data-column-id="author_email">Email Address</th>
                                        <th data-column-id="author_status">Status</th>
                                        <th data-column-id="approvel" data-formatter="approvel">Is Approve</th>
                                        <th data-column-id="action" data-formatter="links">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="authors_list_info"></tbody>
                                </table>
                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"><span class="span-auth-name"></span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card no-shadow">
                                                    <div class="col-md-4">
                                                        <div id="div_pro_img" class=""></div>
                                                        <div class="div-info-icon">
                                                            <div class="row">
                                                                <div class="col-md-3 col-hight">
                                                                    <i class="fa fa-book fa-lg icon-fa-count"></i>
                                                                    <span class="span-tmn-count" id="span_total_ebooks"></span>
                                                                </div>
                                                                <div class="col-md-3 col-hight">
                                                                    <i class="fa fa-hand-o-right fa-lg icon-fa-count"></i>
                                                                </div>
                                                                <div class="col-md-6 col-hight">
                                                                    <i class="fa fa-download fa-lg icon-fa-count"></i>
                                                                    <span class="span-tmn-count" id="span_ebooks_download"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-hight">
                                                                    <i class="fa fa-file-word-o fa-lg icon-fa-count"></i>
                                                                    <span class="span-tmn-count" id="span_total_composition"></span>
                                                                </div>
                                                                <div class="col-md-3 col-hight">
                                                                    <i class="fa fa-hand-o-right fa-lg icon-fa-count"></i>
                                                                </div>
                                                                <div class="col-md-6 col-hight">
                                                                    <i class="fa fa-eye fa-lg icon-fa-count"></i>
                                                                    <span class="span-tmn-count" id="span_composition_seen">9</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <dl class="dl-horizontal">
                                                            <dt>Name</dt>
                                                            <dd><span class="span-auth-name"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Name (Hindi)</dt>
                                                            <dd><span class="span-auth-hindi-name"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal ">
                                                            <dt><i class="zmdi zmdi-email"></i>&nbsp;&nbsp;Emil</dt>
                                                            <dd><span id="author_email"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt><i class="fa fa-home"></i>&nbsp;&nbsp;Address</dt>
                                                            <dd><span id="span-auth-address"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt><i class="fa fa-map-marker"></i>&nbsp;&nbsp;City</dt>
                                                            <dd><span id="span-auth-city"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal ">
                                                            <dt><i class="zmdi zmdi-phone"></i>&nbsp;&nbsp;Contact</dt>
                                                            <dd><span id="author_mobile"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date of Birth</dt>
                                                            <dd><span id="span-auth-dob"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>About yourself</dt>
                                                            <dd><span id="span-auth-about"></span></dd>
                                                        </dl>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="event_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-event" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="serial_number">S.No.</th>
                                        <th data-column-id="event_image" data-formatter="event_image">Event Image</th>
                                        <th data-column-id="event-title">File Title</th>
                                        <th data-column-id="event-date">Event Date</th>
                                        <th data-column-id="event_details" data-formatter="event_more">Event Details</th>
                                        <th data-column-id="event_status">Status</th>
                                        <th data-column-id="approvel" data-formatter="approvel">Is Approve</th>
                                        <th data-column-id="action" data-formatter="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="event_list_info"></tbody>
                                </table>
                                <div class="popover fade bottom in event-details-popover" id="popover288982" role="tooltip" style="top: 671px;left: 53.6406px; display: block;">

                                </div>
                                <div class="popover fade bottom in img-large-popover" id="popover288980" role="tooltip" style="top: 671px;left: 53.6406px; display: block;">
                                    <img src="<?php echo base_url('image/upload/w_400/' . $author_id); ?>" alt="">
                                </div>
                                <div class="modal fade bs-example-modal-lg" id="myModalEvent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel"><span id="span-event-title"></span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card no-shadow">
                                                    <div class="col-md-4">
                                                        <div id="div_event_img" class=""></div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <dl class="dl-horizontal">
                                                            <dt>Event title</dt>
                                                            <dd><span class="span-event-title"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Date</dt>
                                                            <dd><span class="span-event-date"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Place</dt>
                                                            <dd><span id="span-event-place"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Author Name</dt>
                                                            <dd><span id="span-event-author-name"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Author Contact</dt>
                                                            <dd><span id="span-event-author-mobile"></span></dd>
                                                        </dl>
                                                        <dl class="dl-horizontal">
                                                            <dt>Event Details</dt>
                                                            <dd><span id="span-event-details"></span></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="show_case_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-show-case" class="table table-striped data-table-show-case">
                                    <thead>
                                    <tr>
                                        <th data-column-id="serial_number">S.No.</th>
                                        <th data-column-id="book-title">Book Title</th>
                                        <th data-column-id="book-category">Book Category</th>
                                        <th data-column-id="book-files">Uploaded Files</th>
                                        <th data-column-id="book_files_status">Status</th>
                                        <th data-column-id="access" data-formatter="access">Access</th>
                                        <th data-column-id="book_show_case_delete" data-formatter="delete">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody id="show_case_list_info"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="show_case_gallery">
                        <div class="card-body card-padding">
                            <div class="lightbox photos" id="div_book_show_case_gallery">

                            </div>
                            <div class="modal fade bs-example-modal-lg" id="show_case_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel2"><span class="span_show_case_title"></span></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card no-shadow">
                                                <div class="col-md-4">
                                                    <div id="div_show_case_img" class="div_show_case_img">

                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <dl class="dl-horizontal">
                                                        <dt>Book title</dt>
                                                        <dd><span class="span_show_case_title"></span></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Author</dt>
                                                        <dd><span class="span_show_case_author_name"></span></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Contact</dt>
                                                        <dd><span class="span_show_case_author_contact"></span></dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Email</dt>
                                                        <dd><span class="span_show_case_author_email"></span></dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="control_panel">
                        <div class="card no-shadow ">
                            <div class="col-md-2">
                                <div class="radio">
                                    <label class="lbl-radio">
                                        <input type="radio" name="admin_ctrl" id="radio_event" value="">
                                        <i class="input-helper"></i>
                                        <i class="fa fa-plus"></i> Event
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="lbl-radio">
                                        <input type="radio" name="admin_ctrl" id="radio_lang_category" value="">
                                        <i class="input-helper"></i>
                                        <i class="fa fa-plus"></i> Language & Category
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="lbl-radio">
                                        <input type="radio" name="admin_ctrl" id="radio_about_ctrl" value="">
                                        <i class="input-helper"></i>
                                        <i class="fa fa-plus"></i> About Us Manage
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="lbl-radio">
                                        <input type="radio" name="admin_ctrl" id="radio_condition" value="">
                                        <i class="input-helper"></i>
                                        <i class="fa fa-plus"></i> Terms &amp; Condition
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card no-shadow hidden" id="section_event">
                            <form id="form_event_upload" class="form-horizontal">
                                <div class="card-header">
                                    <h2>Event's Information
                                        <small>Use Bootstrap's predefined grid classes to align labels and groups of
                                            form controls in a horizontal layout by adding '.form-horizontal' to the
                                            form. Doing so changes '.form-groups' to behave as grid rows, so no need for
                                            '.row'.
                                        </small>
                                    </h2>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="form-group">
                                        <label for="event_title" class="col-sm-3 control-label">Event Title*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <input type="text" class="form-control" name="event_title" id="event_title" placeholder="Title of Event">
                                                <span class="error-span" data-error-for="event_title"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="event_date" class="col-sm-3 control-label">Date of Event*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <input type='text' class="form-control date-picker" name="event_date" id="event_date" data-toggle="dropdown" placeholder="Click here...">
                                                <span class="error-span" data-error-for="event_date"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="event_title" class="col-sm-3 control-label">Event Place*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <input type="text" class="form-control" name="event_place" id="event_place" placeholder="Plcae of Event">
                                                <span class="error-span" data-error-for="event_place"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="event_title" class="col-sm-3 control-label">Event Details*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <textarea class="form-control" name="event_details" id="event_details" rows="8" placeholder=""></textarea>
                                                <span class="error-span" data-error-for="event_details"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">Event Image <br>(Image Only jpeg/jpg/png/gif)*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <form class="form-image-upload" action="<?php echo base_url('ebook-cover-image-2'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="event_img_upload_form">
                                                    <div class="fileinput fileinput-new file-prev-mng" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                                            <img src="<?php echo base_url('assets/img/headers/ebook-default/ebook_deft_img.jpg'); ?>" class="img-responsive"/>
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file" id="select_image">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="event_img" id="event_img">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <span class="error-span" data-error-for=""></span>
                                            </div>
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
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <button class="btn btn-primary btn-sm" type="submit" name="btn-save-event-info" id="btn-save-event-info">
                                                    Save Event Info
                                                </button>
                                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card no-shadow" id="section_condition">
                            <form id="form_condition_mng" class="form-horizontal">
                                <div class="card-header">
                                    <h2>Terms &amp; Condition</h2>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label class="lbl-radio">
                                                    <input type="radio" name="admin_ctrl" id="radio_add_condition" value="" checked>
                                                    <i class="input-helper"></i>
                                                    <i class="fa fa-plus"></i> Add new Condition
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label class="lbl-radio">
                                                    <input type="radio" name="admin_ctrl" id="radio_edit_condition" value="">
                                                    <i class="input-helper"></i>
                                                    <i class="fa fa-edit"></i> Edit
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body card-padding">

                                            </div>
                                        </div>
                                    </div>
                        <!--    Terms and Condition Add    -->
                                    <div class="row">
                                        <div class="col-offset-md-1 col-md-10" id="section-add-new-condition">
                                            <div class="card-body card-padding" >
                                                <div class="form-group">
                                                    <label for="txt_eng_condition" class="col-sm-3 control-label">English Terms</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type="text" class="form-control" name="txt_eng_condition" id="txt_eng_condition" placeholder="English Condition...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_hindi_condition" class="col-sm-3 control-label">Hindi Terms</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type="text" class="form-control" name="txt_hindi_condition" id="txt_hindi_condition" placeholder="Hindi Condition...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line">
                                                            <button class="btn btn-primary btn-sm" type="button" name="btn-save-condition" id="btn-save-condition">Save Condition</button>
                                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                        <!--    Terms and Condition Edit    -->
                                    <div class="row">
                                        <div class="col-offset-md-1 col-md-10 hidden section-edit-condition" id="">
                                            <div class="card-body card-padding" >
                                                <div class="form-group">
                                                    <label for="txt_eng_condition" class="col-sm-3 control-label">English Condition</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type="text" class="form-control" name="edit_eng_condition" id="edit_eng_condition" placeholder="English Condition...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_hindi_condition" class="col-sm-3 control-label">Hindi Condition</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type="text" class="form-control" name="edit_hindi_condition" id="edit_hindi_condition" placeholder="Hindi Condition...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line">
                                                            <button class="btn btn-primary btn-sm" type="button" name="btn-update-condition" id="btn-update-condition">Update Condition</button>
                                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-offset-md-1 col-md-10 hidden section-edit-condition" id="">
                                            <div class="card-body card-padding" >
                                                <div class="table-responsive">
                                                    <table id="data-table-terms" class="table table-striped data-table-terms">
                                                        <thead>
                                                        <tr>
                                                            <th data-column-id="serial_number">S.No.</th>
                                                            <th data-column-id="english-terms">Terms (English)</th>
                                                            <th data-column-id="hindi-terms">Terms (Hindi)</th>
                                                            <th data-column-id="action" data-formatter="action">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="terms_list_info"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card no-shadow hidden" id="section_language_category">
                            <form id="form_category_language" class="form-horizontal">
                                    <div class="card-header">
                                        <h2>Language & Category
                                            <small>Use Bootstrap's predefined grid classes to align labels and groups of
                                                form controls in a horizontal layout by adding '.form-horizontal' to the
                                                form. Doing so changes '.form-groups' to behave as grid rows, so no need for
                                                '.row'.
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="card-body card-padding">
                                        <div class="col-md-6">
                                            <div class="card-body card-padding">
                                                <div class="form-group">
                                                    <label for="book_language" class="col-sm-3 control-label">Language</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type="text" class="form-control" name="book_language" id="book_language" placeholder="Language">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line">
                                                            <button class="btn btn-primary btn-sm" type="button" name="btn-save-lang" id="btn-save-lang">Save Language</button>
                                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body card-padding">
                                                <div class="form-group">
                                                    <label for="book_category" class="col-sm-3 control-label">Book Category</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type='text' class="form-control" name="book_category" id="book_category" placeholder="Book Category">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line">
                                                            <button class="btn btn-primary btn-sm" type="button" name="btn-save-book-category" id="btn-save-book-category">Save Book Category</button>
                                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body card-padding">
                                                <div class="form-group">
                                                    <label for="book_category" class="col-sm-3 control-label">Composition Category</label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line pos-relative">
                                                            <input type='text' class="form-control" name="composition_category" id="composition_category" placeholder="Composition Category">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-9">
                                                        <div class="fg-line">
                                                            <button class="btn btn-primary btn-sm" type="button" name="btn-save-composition-category" id="btn-save-composition-category">Save Composition Category</button>
                                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div class="card no-shadow hidden" id="section_about_msg">
                            <form id="form_Terms_upload" class="form-horizontal">
                                <div class="card-header">
                                    <h2>About
                                        <small>Update your About Message
                                        </small>
                                    </h2>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="form-group">
                                        <label for="message_english" class="col-sm-3 control-label">Message</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <textarea class="form-control" name="message_english" id="message_english" rows="5" placeholder="Manthan message....."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message_hindi" class="col-sm-3 control-label">मंथन संदेश  (हिन्दी ):</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                                <textarea class="form-control" name="message_hindi" id="message_hindi" rows="5" placeholder="मंथन संदेश....."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <button class="btn btn-primary btn-sm" type="submit" name="btn-update-about-message" id="btn-update-about-message">
                                                    Update About Message
                                                </button>
                                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</footer>
<?php
echo script_tag('assets/js/jquery.js');
echo script_tag('assets/js/bootstrap.min.js');
echo script_tag('assets/js/jquery.mCustomScrollbar.concat.min.js');
echo script_tag('assets/js/waves.min.js');
echo script_tag('assets/js/bootstrap-growl.min.js');
echo script_tag('assets/js/sweet-alert.min.js');
echo script_tag('assets/js/functions.js');
echo script_tag('assets/js/bootstrap-select.js');
echo script_tag('assets/js/moment.min.js');
echo script_tag('assets/js/bootstrap-datetimepicker.min.js');
echo script_tag('assets/js/fileinput.min.js');
echo script_tag('assets/js/jquery.validate.min.js');
echo script_tag('assets/js/admin/admin-mng-ctrl.js');
echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
echo script_tag('assets/js/lightGallery.min.js');
?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        new MBJS.AdminControlPanel("<?php echo base_url(); ?>");
    });
</script>
