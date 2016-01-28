<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php base_url(); ?>assets/ico/favicon.ico">
    <title>GKM IT | Blogs</title>
    <?php
    echo link_tag('https://fonts.googleapis.com/css?family=Poppins:400,500');
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/icons.css');
    echo link_tag('assets/css/overwrite.css');
    echo link_tag('assets/css/prettyPhoto.css');
    echo link_tag('assets/css/style.css');
    echo link_tag('assets/skins/default.css');
    echo link_tag('assets/css/custom.css');
    ?>
</head>
<body>
<div id="loading" class="loading-invisible">
    <div class="loading-center">
        <div class="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
            <div class="object" id="object_five"></div>
            <div class="object" id="object_six"></div>
            <div class="object" id="object_seven"></div>
            <div class="object" id="object_eight"></div>
            <div class="object" id="object_big"></div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("loading").className = "loading-visible";
    var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
    var oldLoad = window.onload;
    var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
    window.onload = newLoad;
</script>
<!-- End preloading -->

<!-- Start theme containt -->
<div id="wrapper">
    <!-- Start navbar -->
    <nav class="navbar yamm">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <?php
                    echo img(array('src'=>'assets/img/gkm-logo.png','alt'=>'GKM IT Logo','itemprop'=>'logo'));
                    ?>
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
                    <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Blogs</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="inner-header">
        <div class="inner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h3><i class="icon-book-open"></i> Blog</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Blog</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <?php
                    $page_no=1;
                    $blog_counter=1;
                    $class = "";
                    foreach($blogs as $blog) {
                        ?>
                        <div class="<?php echo $class; ?>blog-post-container" blog-category="<?php echo $blog['blog_category']; ?>" data-page-no="<?php echo $page_no; ?>">
                            <div class="article-post">
                                <article>
                                    <div class="article-title">
                                        <div class="post-date"><span><?php echo $blog['blog_day']; ?></span><span><?php echo $blog['blog_month']; ?></span><span><?php echo $blog['blog_year']; ?></span></div>
                                        <h5><a href="<?php echo base_url("blogs/".$blog['blog_url']); ?>"><?php echo $blog['blog_title']; ?></a></h5>
                                        <ul class="mata-post">
                                            <li><i class="icon-profile-male"></i> <?php echo $blog['blogger_name']; ?></li>
                                            <li><i class="icon-pencil"></i> <?php echo $blog['blog_category']; ?></li>
                                            <li><i class="icon-chat"></i> <?php echo $blog['no_comments']; ?> comments</li>
                                        </ul>
                                    </div>
                                    <p>
                                        <?php echo $blog['blog_text']; ?>
                                    </p>
                                    <a href="<?php echo base_url("blogs/".$blog['blog_url']); ?>" class="btn btn-default">Read more</a>
                                </article>
                            </div>
                            <div class="divider"></div>
                        </div>
                    <?php
                        $blog_counter++;
                        if($blog_counter==6) {
                            $blog_counter=1;
                            $page_no++;
                            $class = "hidden ";
                        }
                    }
                    ?>
                    <ul class="pagination margin-clear">
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <aside>
                        <div class="widget">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="cat">
                                <li class="All"><a href="#" class="active"><i class="icon-pencil"></i> All</a></li>
                                <li class="Web Design"><a href="#"><i class="icon-pencil"></i> Web Design</a></li>
<!--                                <li class="Web Development"><a href="#"><i class="icon-pencil"></i> Web Development</a></li>-->
<!--                                <li class="ios Development"><a href="#"><i class="icon-pencil"></i> ios Development</a></li>-->
                                <li class="Android Development"><a href="#"><i class="icon-pencil"></i> Android Development</a></li>
                                <li class="Ruby"><a href="#"><i class="icon-pencil"></i> Ruby</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <!-- End aside -->
            </div>
        </div>
    </div>
    <!-- End inner page -->
    <footer>
        <div class="subfooter">
            <p class="copyright">2015 &copy; Copyright <a itemprop='url' href="http://www.gkmit.co/">GKM IT</a> &#45; All Rights Reserved</p>
        </div>
    </footer>
</div>
<?php
echo script_tag("assets/js/jquery.min.js");
echo script_tag("assets/js/bootstrap.min.js");
echo script_tag("assets/js/ie8-responsive-file-warning.js");
echo script_tag("assets/js/ie-emulation-modes-warning.js");
echo script_tag("assets/js/html5shiv.min.js");
echo script_tag("assets/js/respond.min.js");
echo script_tag("assets/js/ie10-viewport-bug-workaround.js");
echo script_tag("assets/js/jquery.easing.1.3.js");
echo script_tag("assets/js/sticky/jquery.sticky.js");
echo script_tag("assets/js/sticky/setting.js");
echo script_tag("assets/js/parallax/jquery.parallax-1.1.3.js");
echo script_tag("assets/js/parallax/setting.js");
echo script_tag("assets/js/totop/jquery.ui.totop.js");
echo script_tag("assets/js/totop/setting.js");
echo script_tag("assets/js/custom.js");
?>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {

        var total_blogs =  $(".blog-post-container").length;
        setPaginationBlock(total_blogs);
        handlePaginationClick();
        function handlePaginationClick() {
            $(".pagination li").on('click',function(e) {
                e.preventDefault();
                var clicked_page = $(this).find('a').attr('data-page');
                if(clicked_page!="prev" && clicked_page!="next") {
                    $(".pagination li").removeClass('active');
                    $(this).addClass('active');
                    $(".blog-post-container").addClass('hidden');
                    var current_category = $(".cat li a.active").closest('li').attr('class');
                    if(current_category!='All') {
                        $(".blog-post-container[data-page-no='"+clicked_page+"'][blog-category='"+current_category+"']").removeClass('hidden');
                    }
                    else {
                        $(".blog-post-container[data-page-no='"+clicked_page+"']").removeClass('hidden');
                    }
                    var last_index = Math.ceil(total_blogs/5);
                    paginationOperation(clicked_page,last_index);
                }
                else if(clicked_page=='next' && !$(this).hasClass('disabled')) {
                    var active_page_no = $(".pagination li.active a").attr('data-page');
                    $(".pagination li.active").next().addClass('active');
                    $(".pagination li.active").eq(0).removeClass('active');
                    var last_index = Math.ceil(total_blogs/5);
                    clicked_page = $(".pagination li.active a").attr('data-page');
                    $(".blog-post-container").addClass('hidden');
                    var current_category = $(".cat li a.active").closest('li').attr('class');
                    if(current_category!='All') {
                        $(".blog-post-container[data-page-no='"+clicked_page+"'][blog-category='"+current_category+"']").removeClass('hidden');
                    }
                    else {
                        $(".blog-post-container[data-page-no='"+clicked_page+"']").removeClass('hidden');
                    }
                    paginationOperation(clicked_page,last_index);
                }
                else if(clicked_page=='prev' && !$(this).hasClass('disabled')) {
                    var active_page_no = $(".pagination li.active a").attr('data-page');
                    console.log(active_page_no);
                    $(".pagination li.active").prev().addClass('active');
                    $(".pagination li.active").eq(1).removeClass('active');
                    var last_index = Math.ceil(total_blogs/5);
                    clicked_page = $(".pagination li.active a").attr('data-page');
                    $(".blog-post-container").addClass('hidden');
                    var current_category = $(".cat li a.active").closest('li').attr('class');
                    if(current_category!='All') {
                        $(".blog-post-container[data-page-no='"+clicked_page+"'][blog-category='"+current_category+"']").removeClass('hidden');
                    }
                    else {
                        $(".blog-post-container[data-page-no='"+clicked_page+"']").removeClass('hidden');
                    }
                    paginationOperation(clicked_page,last_index);
                }
            });
        }
        function paginationOperation(clicked_page,last_index) {
            if(clicked_page==last_index) {
                $(".pagination .next").addClass('disabled');
            }
            else {
                $(".pagination .next").removeClass('disabled');
            }
            if(clicked_page==1) {
                $(".pagination .prev").addClass('disabled');
            }
            else {
                $(".pagination .prev").removeClass('disabled');
            }
        }
        $(".cat li").on('click',function(e) {
            e.preventDefault();
            $('.cat li a').removeClass('active');
            $(this).find('a').addClass('active');
            var category_clicked = $(this).attr('class');
            $(".blog-post-container").addClass('hidden');
            var category_blog_nos = 0;
            var page_counter = 1;
            var data_page_no =1;
            if(category_clicked=='All') {
                $(".blog-post-container").each(function(i,d) {
                    $(this).attr('data-page-no',data_page_no);
                    page_counter++;
                    if(page_counter==6) {
                        data_page_no++;
                        page_counter=1;
                    }
                    if(i>4) {
                        $(this).addClass('hidden');
                    }
                    else {
                        $(this).removeClass('hidden');
                    }
                });
                category_blog_nos = total_blogs;
            }
            else {
                $(".blog-post-container").each(function(i,d) {
                    var blog_container_category = $(this).attr('blog-category');
                    if(blog_container_category==category_clicked) {
                        $(this).attr('data-page-no',data_page_no);
                        if(data_page_no>1) {
                            $(this).addClass('hidden');
                        }
                        else {
                            $(this).removeClass('hidden');
                        }
                        category_blog_nos++;
                        page_counter++;
                        if(page_counter==6) {
                            data_page_no++;
                            page_counter=1;
                        }
                    }
                });
            }
            setPaginationBlock(category_blog_nos);
        });

        function setPaginationBlock(total_blogs) {
            $(".pagination").html("");
            $(".pagination").append('<li class="disabled prev"><a href="#" data-page="prev">Prev</a></li>');
            $(".pagination").append('<li class="active"><a href="#" data-page="1">1</a></li>');
            for(var i=2;i<=Math.ceil(total_blogs/5);i++) {
                $(".pagination").append("<li><a href='#' data-page='"+i+"'>"+i+"</a></li>");
            }
            if(total_blogs>5) {
                $(".pagination").append('<li class="next"><a href="#" data-page="next">Next</a></li>');
            }
            else {
                $(".pagination").append('<li class="next disabled"><a href="#" data-page="next">Next</a></li>');
            }
            $(".pagination li").unbind('click');
            handlePaginationClick();
        }
    });
</script>
