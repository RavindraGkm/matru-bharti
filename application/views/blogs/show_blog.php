<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:type" content="Blog" />
    <meta property="og:title" content="<?php echo $blog['blog_title']; ?>" />
    <meta property="og:description" content="<?php echo $blog['blog_title']; ?>" />
    <link rel="icon" href="ico/favicon.png">
    <title><?php echo $blog['blog_title']; ?></title>
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=2114226868717079";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Start preloading -->
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
            <!-- Start navbar-header -->
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
            <!-- End navbar-header -->

            <!-- Start nav-collapse -->
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
                    <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Blogs</a></li>
                    <li><a itemprop="url" href="<?php echo base_url(); ?>contact">Contact</a></li>
                </ul>
            </div>
            <!-- End nav-collapse -->
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Start inner head -->
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
                            <li><a href="#">Blog</a></li>
                            <li><a href="#" class="active">Singlepost alt 1</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End inner head -->

    <!-- Start inner page -->
    <div class="inner-page">
        <div class="container">
            <div class="row">
                <input type="hidden" id="blog_id" value="<?php echo $blog['blog_id']; ?>">
                <!-- Start article -->
                <div class="col-md-9 col-sm-9">

                    <div class="fb-share-button" data-href="<?php current_url(); ?>" data-layout="button"></div>

                    <!-- Start article 1 -->
                    <div class="article-post">
                        <article>
                            <div class="article-title">
                                <div class="post-date"><span><?php echo $blog['blog_day']; ?></span><span><?php echo $blog['blog_month']; ?></span><span><?php echo $blog['blog_year']; ?></span></div>
                                <h5><a href="#"><?php echo $blog['blog_title']; ?></a></h5>
                                <ul class="mata-post">
                                    <li><i class="icon-profile-male"></i> <?php echo $blog['blogger_name']; ?></li>
                                    <li><i class="icon-pencil"></i> <?php echo $blog['blog_category']; ?></li>
                                    <li><i class="icon-chat"></i> <?php echo $blog['no_comments']; ?> comments</li>
                                </ul>
                            </div>
                            <p>
                                <?php echo $blog['blog_text']; ?>
                            </p>
                        </article>
                    </div>
                    <!-- End article 1 -->

                    <!-- Start comments -->
                    <div class="divider margintop20"></div>

                    <?php
                    if($blog['no_comments']!=0) {
                        ?>
                        <h5 class="head-title">Comments (<?php echo $blog['no_comments']; ?>)</h5>
                        <?php
                        for($i=0;$i<count($comments_and_reply);$i++) {
                            $comment_details = $comments_and_reply[$i][0];
                            $reply_text = $comments_and_reply[$i][1];
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?php echo base_url('assets/img/author01.jpg'); ?>" alt=""/>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><?php echo $comment_details['commenter_name']; ?></h6>
                                    <p><?php echo $comment_details['comment']; ?></p>
                                    <?php
                                    for($reply_counter=0;$reply_counter<count($reply_text);$reply_counter++) {
                                        ?>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="<?php echo base_url('assets/img/author01.jpg'); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><?php echo $reply_text[$reply_counter][0]; ?></h6>
                                                <p>
                                                    <?php echo $reply_text[$reply_counter][1]; ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <p class="reply"><a href="#"><i class="icon-link"></i> Reply</a></p>
                                    <div class="row comment-reply hidden"> 
                                        <form class="reply-comment-form">
                                            <input type="hidden" class="comment-id" value="<?php echo $comment_details['comment_id']; ?>" />
                                            <div class="col-md-12 comment-reply-msg hidden">
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <span class="msg"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 contact-fields"> 
                                                <input type="text" name="reply_name" class="form-control" placeholder="Enter your name"/>
                                            </div> 
                                            <div class="col-md-12 contact-fields"> 
                                                <textarea class="form-control" name="reply_text" rows="3" placeholder="Enter reply here"></textarea> 
                                            </div> 
                                            <div class="col-md-12" style="margin-top: 10px;"> 
                                                <button type="submit" class="btn-post-reply btn btn-rounded btn-primary btn-lg">Post Reply</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="divider margintop50"></div>
                    <?php
                    }
                    ?>
                    <!-- Start leave comments -->
                    <h5 class="head-title">Leave comments</h5>
                    <div id="leave_comment_msg" class="alert hidden alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="msg">askjkas</span>
                    </div>
                    <form class="row leave-comment" id="leave_comment">
                        <div class="col-md-12 contact-fields marginbot30">
                            <input class="form-control input-lg" id="commenter_name" type="text" name="commenter_name" placeholder="Enter your full name..." />
                            <span class="error-span" data-error-for="commenter_name"><i class="fa fa-times"></i></span>
                        </div>
                        <div class="col-md-12 contact-fields marginbot30">
                            <textarea class="form-control input-lg" id="comment" rows="3" name="comment" placeholder="Your comment here..."></textarea>
                            <span class="error-span" data-error-for="comment"><i class="fa fa-times"></i></span>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="btn_leave_comment" class="btn btn-rounded btn-primary btn-lg">leave comment</button>
                        </div>
                    </form>
                </div>
                <!-- Start aside -->
                <div class="col-md-3 col-sm-3">
                    <aside>
                        <div class="widget">
                            <h5 class="widget-title">Recent Blogs</h5>
                            <ul class="recent">
                                <?php
                                foreach($top_three_blogs as $blog) {
                                    ?>
                                    <li>
                                        <h6><a href="<?php echo $blog['blog_url']; ?>"><?php echo $blog['blog_title']; ?></a></h6>
                                        <p><?php echo substr($blog['blog_text'],0,90); ?>...</p>
                                    </li>
                                <?php
                                }
                                ?>
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
echo script_tag("assets/js/jquery.validate.min.js");
echo script_tag("assets/js/totop/setting.js");
echo script_tag("assets/js/custom.js");
?>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        var leave_comment = $("#btn_leave_comment");
        $("#leave_comment").validate({
            rules: {
                commenter_name: {
                    required: true
                },
                comment: {
                    required : true,
                }
            },
            messages : {
                commenter_name: {
                    required: 'Enter your name'
                },
                comment: {
                    required: 'Enter your comment'
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "<?php echo base_url('blogs/new-comment'); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        blog_id:$("#blog_id").val(),
                        commenter_name: $("#commenter_name").val(),
                        comment: $("#comment").val()
                    },
                    beforeSend: function() {
                        leave_comment.html('Processing...');
                    },
                    success: function (data, textStatus, jqXHR) {
                        $("#leave_comment_msg").removeClass('hidden');
                        $("#leave_comment_msg span.msg").html(data.msg);
                    },
                    complete: function (jqXHR, textStatus) {
                        leave_comment.html('leave comment');
                    }
                });
            },
            errorPlacement: function(error, element) {
                $( element ).closest( "form" ).find( "span[data-error-for='" + element.attr( "id" ) + "']").html(error[0].innerHTML).css('opacity',1);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('.contact-fields').find('.error-span').css('opacity',0);
            }
        });
        $('form.reply-comment-form').each(function(key, form) {
            var replay_form = $(this);
            $(form).validate({
                rules: {
                    reply_name: {
                        required: true
                    },
                    reply_text: {
                        required : true,
                    }
                },
                messages : {
                    reply_name: {
                        required: 'Enter your name'
                    },
                    reply_text: {
                        required: 'Enter your comment'
                    }
                },
                submitHandler: function(form) {
                    var reply_name = replay_form.find("input[name='reply_name']").val();
                    var reply_text = replay_form.find("textarea[name='reply_text']").val();
                    var comment_id = replay_form.find("input[class='comment-id']").val();
                    var button_post_reply = replay_form.find(".btn-post-reply");
                    var msg_box = replay_form.find('.comment-reply-msg');
                    $.ajax({
                        url: "<?php echo base_url('blogs/comment-reply'); ?>",
                        type: "POST",
                        dataType: "JSON",
                        data:{
                            comment_id:comment_id,
                            reply_name:reply_name,
                            reply_text:reply_text
                        },
                        beforeSend: function() {
                            button_post_reply.html("Processing...");
                        },
                        success: function (data, textStatus, jqXHR) {
                            if(data.status==200) {
                                msg_box.removeClass('hidden');
                                msg_box.find('span.msg').html(data.msg);
                            }
                        },
                        complete: function (jqXHR, textStatus) {
                            button_post_reply.html("Post Reply");
                        }
                    });
                }
            });
        });
        $(".reply").click(function(e) {

            FB.ui({
                method: 'share',
                href: 'https://developers.facebook.com/docs/',
            }, function(response){});


            e.preventDefault();
            var button = $(this);
            if(button.closest('.media-body').find('.comment-reply').hasClass('hidden')) {
                button.closest('.media-body').find('.comment-reply').removeClass('hidden');
            }
            else {
                button.closest('.media-body').find('.comment-reply').addClass('hidden');
            }
        });
    });
</script>