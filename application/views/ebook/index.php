<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
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
        echo link_tag('assets/css/jquery.mCustomScrollbar.min.css ');
        echo link_tag('assets/css/app.min.1.css');
        echo link_tag('assets/css/app.min.2.css');
        echo link_tag('assets/css/font-awesome.min.css');
        echo link_tag('assets/css/jquery.bootgrid.min.css');
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
            <a href="<?php echo base_url(''); ?>">
                Martu Bharti
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
                    <img src="<?php echo base_url('image/upload/w_400/'.$author_id);?>" alt="">
                </div>
                <div class="profile-info">
                    <span class="span-auth-name"></span>
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
            <li><a href="<?php echo base_url('ebook-mng?tab=ebook'); ?>"><i class="fa fa-book"></i> E-Book Management</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=composition'); ?>"><i class="fa fa-file-word-o"></i> Composition</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=ebook_list'); ?>"><i class="fa fa-list"></i> List of Uploaded Books</a></li>
            <li><a href="<?php echo base_url('ebook-mng?tab=composition_list'); ?>"><i class="fa fa-list"></i> List of Uploaded Composition</a></li>
        </ul>
    </aside>
    <section id="content">
        <div class="container">

            <div class="block-header col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <h2 id="h2_name"></h2>
            </div>

            <div class="card col col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12" id="profile-main">
                <input type="hidden" value="<?php echo $active_tab; ?>" id="active_tab_val" />
                <ul class="tab-nav" role="tablist">
                    <li role="presentation" id="tab_ebook"><a href="#ebook" aria-controls="ebook" role="tab" data-toggle="tab">e-book Upload</a></li>
                    <li role="presentation" id="tab_composition"><a href="#composition" aria-controls="composition" role="tab" data-toggle="tab">composition / Creation upload</a></li>
                    <li role="presentation" id="tab_ebook_list"><a href="#ebook_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">List of Upload Files</a></li>
                    <li role="presentation" id="tab_composition_list"><a href="#composition_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">List of Upload Files</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook">
                        <div class="pmbb-body p-1-30 pmb-block">
                            <div class="pmbb-body p-l-30">
                                <input type="hidden" value="<?php echo $remember_token; ?>" name="remember_token" id="remember_token">
                                <input type="hidden" value="<?php echo $author_id; ?>" name="author_id" id="author_id">
                                <form id="form_ebook_upload">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Language*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="book_language" id="book_language">
                                                        <option value="">Select Language...</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="English">English</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Category*</dt>
                                            <dd>
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
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">File Title*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="file_title" id="file_title" placeholder="Title of book">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Tags</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type='text' class="form-control" name="book_tag" id="book_tag" placeholder="Add a tag">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">File (Only doc/docx)*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <form class="form-image-upload" action="<?php echo base_url('profile-image-2'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                                        <input type="file" class="form-control" name="ebook_file" id="ebook_file" >
                                                    </form>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Cover Page (Image Only<br> jpeg/jpg/png/gif)*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="file" class="form-control" name="ebook_cover" id="ebook_cover">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">About this book*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <textarea class="form-control" name="about_book" id="about_book" rows="8" placeholder=""></textarea>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10"></dt>
                                            <dd>
                                                <div class="fg-line m-t-30">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="btn-save-book-info" id="btn-save-book-info">Add</button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="composition">
                        <div class="pmbb-body p-1-30 pmb-block">
                            <div class="pmbb-body p-l-30">
                                <form id="form_composition_upload">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Language*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="composition_language" id="composition_language">
                                                        <option value="">Select Language...</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="English">English</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Category*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="composition_category" id="composition_category">
                                                        <option value="">Select Category...</option>
                                                        <option value="Stories">Stories</option>
                                                        <option value="Articles">Articles</option>
                                                        <option value="Spritual">Spritual</option>
                                                        <option value="Religious">Religious</option>
                                                        <option value="Novels">Novels</option>
                                                        <option value="Motivational">Motivational</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Composition Title*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="composition_title" id="composition_title" placeholder="Title of book">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">About this composition/ <br> creation*</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <textarea class="form-control" name="about_composition" id="about_composition" rows="8" placeholder=""></textarea>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10"></dt>
                                            <dd>
                                                <div class="fg-line m-t-30">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="btn-save-composition-info" id="btn-save-book-info">Add</button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="ebook_list">
                        <div class="pmb-block">
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>Book Example <small>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</small></h2>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="data-table-basic" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-column-id="sender">File Title</th>
                                                    <th data-column-id="id" data-type="numeric">Status</th>
                                                    <th data-column-id="received" data-order="desc">Expected Publish Date</th>
                                                    <th data-column-id="" data-order="desc">View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>ABCD</td>
                                                    <td>Submit</td>
                                                    <td>23.10.2013</td>
                                                    <td>View</td>
                                                </tr>
                                                <tr>
                                                    <td>10247</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>23.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10247</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>23.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10252</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>28.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10236</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>12.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10241</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>17.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10246</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>22.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10251</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>27.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10235</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>11.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10240</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>16.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10245</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>21.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10250</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>26.10.2013</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane pmb-block" id="composition_list">
                        <div class="pmb-block">
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>Composition Example <small>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</small></h2>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="data-table-basic" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-column-id="sender">File Title</th>
                                                    <th data-column-id="id" data-type="numeric">Status</th>
                                                    <th data-column-id="received" data-order="desc">Expected Publish Date</th>
                                                    <th data-column-id="" data-order="desc">View</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>ABCD</td>
                                                    <td>Submit</td>
                                                    <td>23.10.2013</td>
                                                    <td>View</td>
                                                </tr>
                                                <tr>
                                                    <td>10247</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>23.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10247</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>23.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10252</td>
                                                    <td>robert@bingo.com</td>
                                                    <td>28.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10236</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>12.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10241</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>17.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10246</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>22.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10251</td>
                                                    <td>simon@yahoo.com</td>
                                                    <td>27.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10235</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>11.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10240</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>16.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10245</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>21.10.2013</td>
                                                </tr>
                                                <tr>
                                                    <td>10250</td>
                                                    <td>tim@microsoft.com</td>
                                                    <td>26.10.2013</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<footer id="footer">
    Copyright &copy; 2015 Rawna Rajput Matrimonial

    <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">Dashboard</a></li>
        <li><a href="">Reports</a></li>
        <li><a href="">Support</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</footer>

 Page Loader
<div class="page-loader">
    <div class="preloader pls-blue">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
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
echo script_tag('assets/js/functions.js');
echo script_tag('assets/js/jquery.validate.min.js');
echo script_tag('assets/js/demo.js');
echo script_tag('assets/js/ebook/book-upload.js');
echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
?>
</body>
</html>
<script type="text/javascript">
   $(document).ready(function(){
        new MBJS.AuthorBook("<?php echo base_url(); ?>");
        //Basic Example
        $("#data-table-basic").bootgrid({
            css: {
                icon: 'zmdi icon',
                iconColumns: 'zmdi-view-module',
                iconDown: 'zmdi-expand-more',
                iconRefresh: 'zmdi-refresh',
                iconUp: 'zmdi-expand-less'
            }
        });
<!---->
       //Selection
        $("#data-table-selection").bootgrid({
            css: {
                icon: 'zmdi icon',
                iconColumns: 'zmdi-view-module',
                iconDown: 'zmdi-expand-more',
                iconRefresh: 'zmdi-refresh',
                iconUp: 'zmdi-expand-less'
            },
            selection: true,
            multiSelect: true,
            rowSelect: true,
            keepSelection: true
        });
<!---->
       //Command Buttons
        $("#data-table-command").bootgrid({
            css: {
              icon: 'zmdi icon',
                iconColumns: 'zmdi-view-module',
                iconDown: 'zmdi-expand-more',
                iconRefresh: 'zmdi-refresh',
                iconUp: 'zmdi-expand-less'
            },
            formatters: {
                "commands": function(column, row) {
                    return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                }
            }
        });
    });
</script>
