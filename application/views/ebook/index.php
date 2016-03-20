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
          Manthan
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
        <li id="a_ebook" class="s">
          <a href="<?php echo base_url('ebook-mng?tab=ebook'); ?>"><i class="fa fa-book"></i> E-Book
            Management</a>
          </li>
          <li id="a_composition">
            <a href="<?php echo base_url('ebook-mng?tab=composition'); ?>"> <i class="fa fa-file-word-o"></i>
              Composition</a>
            </li>
            <li id="a_ebook_list">
              <a href="<?php echo base_url('ebook-mng?tab=ebook_list'); ?>"> <i class="fa fa-list"></i> List of
                Uploaded Books</a>
              </li>
              <li id="a_composition_list">
                <a href="<?php echo base_url('ebook-mng?tab=composition_list'); ?>"> <i class="fa fa-list"></i> List of
                  Uploaded Composition</a>
                </li>
                <li id="a_top_authors">
                  <a href="<?php echo base_url('ebook-mng?tab=top_authors'); ?>"> <i class="fa fa-users"></i> List of
                    Top 10 Authors</a>
                  </li>
                  <li id="a_event">
                    <a href="<?php echo base_url('ebook-mng?tab=event'); ?>"><i class="fa fa-bell"></i> Event
                      Management</a>
                    </li>
                    <li id="a_show_case">
                      <a href="<?php echo base_url('ebook-mng?tab=show_case'); ?>"><i class="fa fa-book"></i> Books Show Case </a>
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
                        <li role="presentation" id="tab_ebook">
                          <a href="#ebook" aria-controls="ebook" role="tab" data-toggle="tab">
                            <i class="fa fa-book fa-lg"></i>&nbsp;E-Book Upload
                          </a>
                        </li>
                        <li role="presentation" id="tab_composition">
                          <a href="#composition" aria-controls="composition" role="tab" data-toggle="tab">
                            <i class="fa fa-file-word-o fa-lg"></i>&nbsp;Composition upload
                          </a>
                        </li>
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
                        <li role="presentation" id="tab_top_authors">
                          <a href="#top_authors" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                            <i class="fa fa-users fa-lg"></i>&nbsp;Top 10 Authors
                          </a>
                        </li>
                        <li role="presentation" id="tab_event">
                          <a href="#event" aria-controls="event" role="tab" data-toggle="tab">
                            <i class="fa fa-bell fa-lg"></i>&nbsp;Event Creation
                          </a>
                        </li>
                        <li role="presentation" id="tab_show_case">
                          <a href="#show_case" aria-controls="show_case" role="tab" data-toggle="tab">
                            <i class="fa fa-book fa-lg"></i>&nbsp;Books Show Case
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
                                <label for="book_category" class="col-sm-3 control-label">Select Language*</label>
                                <div class="col-sm-9">
                                  <div class="fg-line pos-relative">
                                    <select class="form-control" name="book_language" id="book_language">
                                      <option value="">Select Language...</option>
                                    </select>
                                    <span class="error-span" data-error-for="book_language"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="book_category" class="col-sm-3 control-label">Select Category*</label>
                                <div class="col-sm-9">
                                  <div class="fg-line pos-relative">
                                    <select class="form-control" name="book_category" id="book_category">
                                      <option value="">Select Category...</option>
                                    </select>
                                    <span class="error-span" data-error-for="book_category"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="book_language" class="col-sm-3 control-label">File Title*</label>
                                <div class="col-sm-9">
                                  <div class="fg-line pos-relative">
                                    <input type="text" class="form-control" name="file_title" id="file_title" placeholder="Title of book">
                                    <span class="error-span" data-error-for="file_title"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="book_language" class="col-sm-3 control-label">Tags</label>
                                <div class="col-sm-9">
                                  <div class="fg-line pos-relative">
                                    <input type='text' class="form-control" name="book_tag" id="book_tag" placeholder="Add a tag">
                                    <span class="error-span" data-error-for="book_tag"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="book_language" class="col-sm-3 control-label">File (Only pdf)*</label>
                                <div class="col-sm-9">
                                  <div class="fg-line pos-relative">
                                    <input type="hidden" name="ebook_file_path" id="ebook_file_path" value="">
                                    <form class="form-image-upload" action="<?php echo base_url('ebook-file-upload'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="ebook_upload_form_00">
                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-primary btn-file m-r-10">
                                          <span class="fileinput-new">Select file</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="ebook_file_00" id="ebook_file_00" accept="application/pdf"/>
                                        </span>
                                        <span class="fileinput-filename"></span>
                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                      </div>
                                    </form>
                                    <span class="error-span" data-error-for="ebook_file_path"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="book_language" class="col-sm-3 control-label">Cover Page (Image Only<br>
                                  jpeg/jpg/png/gif)*</label>
                                  <div class="col-sm-9">
                                    <div class="fg-line">
                                      <form class="form-image-upload" action="<?php echo base_url('ebook-cover-image-2'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="ebook_cover_upload_form">
                                        <div class="fileinput fileinput-new file-prev-mng" data-provides="fileinput">
                                          <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                            <img src="<?php echo base_url('assets/img/headers/ebook-default/ebook_deft_img.jpg'); ?>" class="img-responsive"/>
                                          </div>
                                          <div>
                                            <span class="btn btn-primary btn-file" id="select_image">
                                              <span class="fileinput-new">Select image</span>
                                              <span class="fileinput-exists">Change</span>
                                              <input type="file" name="ebook_cover" id="ebook_cover" accept="image/*">
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
                                  <label for="book_language" class="col-sm-3 control-label">About this book*</label>
                                  <div class="col-sm-9">
                                    <div class="fg-line pos-relative">
                                      <textarea class="form-control" name="about_book" id="about_book" rows="8" placeholder=""></textarea>
                                      <span class="error-span" data-error-for="about_book"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="book_language" class="col-sm-3 control-label"></label>
                                  <div class="col-sm-9">
                                    <div class="fg-line">
                                      <button class="btn btn-primary btn-sm" type="button" name="btn-save-book-info" id="btn-save-book-info">Save Book Info
                                      </button>
                                      <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

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
                                <!--                                <input type="hidden" id="composition_creation_date" name="composition_creation_date" value="--><?php //echo $current_date;?><!--">-->
                                <div class="card-body card-padding">
                                  <div class="form-group">
                                    <label for="composition_language" class="col-sm-3 control-label">Language*</label>
                                    <div class="col-sm-9">
                                      <div class="fg-line pos-relative">
                                        <select class="form-control" name="composition_language" id="composition_language">
                                          <option value="">Select Language...</option>
                                          <option value="Hindi">Hindi</option>
                                          <option value="English">English</option>
                                        </select>
                                        <span class="error-span" data-error-for="composition_language"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_language" class="col-sm-3 control-label">Category*</label>
                                    <div class="col-sm-9">
                                      <div class="fg-line pos-relative">
                                        <select class="form-control" name="composition_category" id="composition_category">
                                          <option value="">Select Category...</option>
                                          <option value="Stories">Stories</option>
                                          <option value="Articles">Articles</option>
                                          <option value="Spritual">Spritual</option>
                                          <option value="Religious">Religious</option>
                                          <option value="Novels">Novels</option>
                                          <option value="Motivational">Motivational</option>
                                        </select>
                                        <span class="error-span" data-error-for="composition_category"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_language" class="col-sm-3 control-label">Composition Title *</label>
                                    <div class="col-sm-9">
                                      <div class="fg-line pos-relative">
                                        <input type="text" class="form-control" name="composition_title" id="composition_title" placeholder="Title of book" />
                                        <span class="error-span" data-error-for="composition_title"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_language" class="col-sm-3 control-label">About this composition/ <br> creation*</label>
                                    <div class="col-sm-9">
                                      <div class="fg-line pos-relative">
                                        <textarea class="form-control" name="about_composition" id="about_composition" rows="8" placeholder=""></textarea>
                                        <span class="error-span" data-error-for="about_composition"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="book_language" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                      <div class="fg-line">
                                        <button class="btn btn-primary btn-sm" type="submit" name="btn-save-composition-info" id="btn-save-composition-info">
                                          Save Composition Info
                                        </button>
                                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane pmb-block" id="ebook_list">
                              <div class="card no-shadow">
                                <div class="table-responsive">
                                  <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th data-column-id="serial_number">S.No.</th>
                                        <th data-column-id="file_title">File Title</th>
                                        <th data-column-id="file-published-status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="advertisement_status">Adv. Status</th>
                                        <th data-column-id="file_attachment" data-formatter="file_link">File Attachment</th>
                                        <th data-column-id="approvel" data-formatter="req_approvel">Req. for Advertisement</th>
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
                                        <th data-column-id="serial_number">S.No.</th>
                                        <th data-column-id="file-title">File Title</th>
                                        <th data-column-id="about_composition" data-formatter="composition_more">Composition</th>
                                        <th data-column-id="file-published-status">File Published Status</th>
                                        <th data-column-id="publish-date">Publish Date</th>
                                        <th data-column-id="action" data-formatter="composition_delete">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody id="composition_list_info"></tbody>
                                  </table>
                                  <div class="popover fade bottom in composition_more_desctiption" id="popover288972" role="tooltip" style="top: 671px;left: 53.6406px; display: block;">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane pmb-block" id="top_authors">
                              <div class="card no-shadow">
                                <h2>
                                  Top 10 Authors
                                </h2>
                                <div class="table-responsive">
                                  <table id="data-table-top-ebook-author" class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th data-column-id="serial_number">S.No.</th>
                                        <th data-column-id="author_image" data-formatter="author_image">Author Image</th>
                                        <th data-column-id="event-image">Name</th>
                                        <th data-column-id="event-title">City</th>
                                        <th data-column-id="event-date">Total Downloads</th>
                                      </tr>
                                    </thead>
                                    <tbody id="top_ebook_author_list"></tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane pmb-block" id="event">
                              <ul class="tab-nav" role="tablist">
                                <li role="presentation" id="tab_event_create">
                                  <a href="#event_create" aria-controls="event_create" role="tab" data-toggle="tab">
                                    <i class="fa fa-bell fa-lg"></i>&nbsp;&nbsp;Event Creation
                                  </a>
                                </li>
                                <li role="presentation" id="tab_event_list">
                                  <a href="#event_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                                    <i class="fa fa-list fa-lg"></i>&nbsp;&nbsp;Events List
                                  </a>
                                </li>
                              </ul>
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane pmb-block" id="event_create">
                                  <div class="card no-shadow">
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
                                            <th data-column-id="event-place">Event Place</th>
                                            <th data-column-id="event_details" data-formatter="event_more">Event Details</th>
                                            <th data-column-id="event-status">Status</th>
                                            <th data-column-id="action" data-formatter="links">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody id="event_list_info"></tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane pmb-block" id="show_case">
                              <ul class="tab-nav" role="tablist">
                                <li role="presentation" id="tab_show_case_create">
                                  <a href="#show_case_create" aria-controls="show_case_create" role="tab" data-toggle="tab">
                                    <i class="fa fa-bell fa-lg"></i>&nbsp;&nbsp;Book Show Case Creation
                                  </a>
                                </li>
                                <li role="presentation" id="tab_show_case_list">
                                  <a href="#show_case_list" aria-controls="upload-file-list" role="tab" data-toggle="tab">
                                    <i class="fa fa-list fa-lg"></i>&nbsp;&nbsp;Book Show Case List
                                  </a>
                                </li>
                              </ul>
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane pmb-block" id="show_case_create">
                                  <div class="card no-shadow">
                                    <form id="form_show_case_upload" class="form-horizontal">
                                      <div class="card-header">
                                        <h2>Book Show Case Information
                                          <small>Use Bootstrap's predefined grid classes to align labels and groups of
                                            form controls in a horizontal layout by adding '.form-horizontal' to the
                                            form. Doing so changes '.form-groups' to behave as grid rows, so no need for
                                            '.row'.
                                          </small>
                                        </h2>
                                      </div>
                                      <div class="card-body card-padding">
                                        <div class="form-group">
                                          <label for="book_language" class="col-sm-3 control-label">Category*</label>
                                          <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                              <select class="form-control" name="show_case_category" id="show_case_category">
                                                <option value="">Select Category...</option>
                                                <option value="Stories">Stories</option>
                                                <option value="Articles">Articles</option>
                                                <option value="Spritual">Spritual</option>
                                                <option value="Religious">Religious</option>
                                                <option value="Novels">Novels</option>
                                                <option value="Motivational">Motivational</option>
                                              </select>
                                              <span class="error-span" data-error-for="show_case_category"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="show_case_title" class="col-sm-3 control-label">File Title*</label>
                                          <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                              <input type="text" class="form-control" name="show_case_title" id="show_case_title" placeholder="Title of Book">
                                              <span class="error-span" data-error-for="show_case_title"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="show_case_file" class="col-sm-3 control-label">File (Only pdf)*</label>
                                          <div class="col-sm-9">
                                            <div class="fg-line pos-relative">
                                              <input type="hidden" name="show_case_book_file_path" id="show_case_book_file_path" value="">
                                              <form class="show_case_book_upload_form" action="<?php echo base_url('upload/ebook-file'); ?>" onSubmit="return false" method="post" enctype="multipart/form-data" id="show_case_book_upload_form">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                  <span class="btn btn-primary btn-file m-r-10">
                                                    <span class="fileinput-new">Select file</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="show_case_file" id="show_case_file" accept="application/pdf"/>
                                                  </span>
                                                  <span class="fileinput-filename"></span>
                                                  <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                                                </div>
                                              </form>
                                              <span class="error-span" data-error-for="show_case_book_file_path"></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="book_language" class="col-sm-3 control-label"></label>
                                          <div class="col-sm-9">
                                            <div class="fg-line">
                                              <button class="btn btn-primary btn-sm" type="submit" name="btn-save-show-case-info" id="btn-save-show-case-info">
                                                Save Show Case Info
                                              </button>
                                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <div role="tabpanel" class="tab-pane pmb-block" id="show_case_list">
                                  <div class="card no-shadow">
                                    <div class="table-responsive">
                                      <table id="data-table-show_case" class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th data-column-id="serial_number">S.No.</th>
                                            <th data-column-id="book-title">Book Title</th>
                                            <th data-column-id="book-category">Book Category</th>
                                            <th data-column-id="book-files">Uploaded Files</th>
                                            <th data-column-id="status">Status</th>
                                            <th data-column-id="action" data-formatter="links">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody id="show_case_list_info"></tbody>
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

                  <footer id="footer">
                    Copyright &copy; 2016 Manthan

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
                  echo script_tag('assets/js/moment.min.js');
                  echo script_tag('assets/js/bootstrap-datetimepicker.min.js');
                  echo script_tag('assets/js/jquery.bootgrid.updated.min.js');
                  echo script_tag('assets/js/bootstrap-select.js');
                  echo script_tag('assets/js/functions.js');
                  echo script_tag('assets/js/fileinput.min.js');
                  echo script_tag('assets/js/jquery.form.min.js');
                  echo script_tag('assets/js/ebook/book-upload.js');
                  ?>
                </body>
                </html>
                <script type="text/javascript">
                $(document).ready(function () {
                  new MBJS.AuthorBook("<?php echo base_url(); ?>");
                });
                </script>
