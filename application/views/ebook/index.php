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
                    <img src="<?php echo base_url('image/upload/w_400/' . $author_id); ?>" alt="">
                </div>
                <div class="profile-info">
                    <span class="span-auth-name"></span>
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
                <a href="<?php echo base_url('ebook-mng?tab=ebook'); ?>"><i class="fa fa-book"></i> E-Book
                    Management</a>
            </li>
            <li>
                <a href="<?php echo base_url('ebook-mng?tab=composition'); ?>"> <i class="fa fa-file-word-o"></i>
                    Composition</a>
            </li>
            <li>
                <a href="<?php echo base_url('ebook-mng?tab=ebook_list'); ?>"> <i class="fa fa-list"></i> List of
                    Uploaded Books</a>
            </li>
            <li>
                <a href="<?php echo base_url('ebook-mng?tab=composition_list'); ?>"> <i class="fa fa-list"></i> List of
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
                    <li role="presentation" id="tab_ebook">
                        <a href="#ebook" aria-controls="ebook" role="tab" data-toggle="tab">
                            <i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;E-Book Upload
                        </a>
                    </li>
                    <li role="presentation" id="tab_composition">
                        <a href="#composition" aria-controls="composition" role="tab" data-toggle="tab">
                            <i class="fa fa-file-word-o fa-lg"></i>&nbsp;&nbsp;Composition / Creation upload
                        </a>
                    </li>
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
                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook">
                        <div class="card no-shadow">
                            <input type="hidden" value="<?php echo $remember_token; ?>" name="remember_token"
                                   id="remember_token">
                            <input type="hidden" value="<?php echo $author_id; ?>" name="author_id" id="author_id">
                            <form id="form_ebook_upload" class="form-horizontal">
                                <div class="card-header">
                                    <h2>E-Book Information
                                        <small>Use Bootstrap's predefined grid classes to align labels and groups of
                                            form controls in a horizontal layout by adding '.form-horizontal' to the
                                            form. Doing so changes '.form-groups' to behave as grid rows, so no need for
                                            '.row'.
                                        </small>
                                    </h2>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="form-group">
                                        <label for="composition_category" class="col-sm-3 control-label">Select Language
                                            *</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <select class="form-control" name="book_language" id="book_language">
                                                    <option value="">Select Language...</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="English">English</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_category" class="col-sm-3 control-label">Select Category*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <select class="form-control" name="book_category" id="book_category">
                                                    <option value="">Select Category...</option>
                                                    <option value="Stories">Stories</option>
                                                    <option value="Articles">Articles</option>
                                                    <option value="Spritual">Spritual</option>
                                                    <option value="Religious">Religious</option>
                                                    <option value="Novels">Novels</option>
                                                    <option value="Motivational">Motivational</option>
                                                    <option value="Classic">Classic</option>
                                                    <option value="Children">Children</option>
                                                    <option value="Cooking">Cooking</option>
                                                    <option value="Humor">Humor</option>
                                                    <option value="Magazine">Magazine</option>
                                                    <option value="Poems">Poems</option>
                                                    <option value="Travel">Travel</option>
                                                    <option value="Women">Women</option>
                                                    <option value="Drama">Drama</option>
                                                    <option value="Love Stories">Love Stories</option>
                                                    <option value="Adventure">Adventure</option>
                                                    <option value="Fiction">Fiction</option>
                                                    <option value="Adventure,Fiction">Adventure,Fiction</option>
                                                    <option value="Human Science">Human Science</option>
                                                    <option value="Philosophy">Philosophy</option>
                                                    <option value="Health">Health</option>
                                                    <option value="Education">Education</option>
                                                    <option value="Biography">Biography</option>
                                                    <option value="Management">Management</option>
                                                    <option value="Food">Food</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">File Title*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <input type="text" class="form-control" name="file_title" id="file_title" placeholder="Title of book">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">Tags</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <input type='text' class="form-control" name="book_tag" id="book_tag" placeholder="Add a tag">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">File (Only doc/docx)*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <form class="form-image-upload" action="<?php echo base_url('upload/ebook-file'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="ebook_upload_form">
                                                    <input type="file" class="form-control hidden" name="" id="ebook_file"/>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <span class="btn btn-primary btn-file m-r-10">
                                                            <span class="fileinput-new">Select file</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" class="form-control" name="ebook_file" id="ebook_file"/>
                                                        </span>
                                                        <span class="fileinput-filename"></span>
                                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">Cover Page (Image Only<br>
                                            jpeg/jpg/png/gif)*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <form class="form-image-upload" action="<?php echo base_url('upload/ebook-file'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="ebook_cover_upload_form">
<!--                                                <input type="file" class="form-control" name="ebook_cover" id="ebook_cover">-->
                                                    <div class="fileinput fileinput-new file-prev-mng" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file" id="select_image">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="ebook_cover" id="ebook_cover">
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">About this book*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <textarea class="form-control" name="about_book" id="about_book" rows="8" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <button class="btn btn-primary btn-sm" type="submit" name="btn-save-book-info" id="btn-save-book-info">Save Book Info
                                                </button>
                                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="composition">
                        <div class="card no-shadow">
                            <form id="form_composition_upload" class="form-horizontal">
                                <div class="card-header">
                                    <h2>Composition Information
                                        <small>Use Bootstrap's predefined grid classes to align labels and groups of
                                            form controls in a horizontal layout by adding '.form-horizontal' to the
                                            form. Doing so changes '.form-groups' to behave as grid rows, so no need for
                                            '.row'.
                                        </small>
                                    </h2>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="form-group">
                                        <label for="composition_language" class="col-sm-3 control-label">Language*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <select class="form-control" name="composition_language" id="composition_language">
                                                    <option value="">Select Language...</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="English">English</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">Category*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <select class="form-control" name="composition_category"
                                                        id="composition_category">
                                                    <option value="">Select Category...</option>
                                                    <option value="Stories">Stories</option>
                                                    <option value="Articles">Articles</option>
                                                    <option value="Spritual">Spritual</option>
                                                    <option value="Religious">Religious</option>
                                                    <option value="Novels">Novels</option>
                                                    <option value="Motivational">Motivational</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">Composition Title *</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <input type="text" class="form-control" name="composition_title" id="composition_title" placeholder="Title of book" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label">About this composition/ <br> creation*</label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <textarea class="form-control" name="about_composition" id="about_composition" rows="8" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_language" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <div class="fg-line">
                                                <button class="btn btn-primary btn-sm" type="submit" name="btn-save-composition-info" id="btn-save-book-info">
                                                    Save Composition Info
                                                </button>
                                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook_list">
                        <div class="card no-shadow">
                            <div class="table-responsive">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="file_title">File Title</th>
                                        <th data-column-id="file-published-status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="file-attachment">File Attachment</th>
                                        <th data-column-id="action" data-formatter="links">Actions</th>
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
                                        <th data-column-id="file-published-status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="file-attachment">File Attachment</th>
                                        <th data-column-id="action" data-type="text">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="composition_list_info"></tbody>
                                </table>
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
echo script_tag('assets/js/ebook/book-upload.js');
echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        new MBJS.AuthorBook("<?php echo base_url(); ?>");
    });
</script>
