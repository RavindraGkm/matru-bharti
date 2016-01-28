<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="web development udaipur, website development udaipur, web development company in udaipur, website development company in udaipur">
    <meta name="description" content="Web Development Company in Udaipur,India. GKM IT Pvt. Ltd. is leading website development and web services in Udaipur." />
    <meta name="robots" content="index,follow" />
    <meta name="publisher" content="GKM IT Pvt. Ltd" />
    <meta name="author" content="GKM IT Pvt. Ltd" />
    <meta name="language" content="english" />
    <link rel="icon" href="<?php base_url(); ?>assets/ico/favicon.ico">
    <title>GKM IT | Portfolio</title>
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
<div itemscope itemtype="https://schema.org/LocalBusiness">
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
    <div id="wrapper">
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
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                        <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
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
                            <h3><i class="icon-toolbox"></i> Portfolio</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <ol class="breadcrumb">
                                <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a itemprop="url" href="#" class="active">Portfolio</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="containt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading">
                            <h3>Our <span>portfolio</span></h3>
                            <p>Projects we done</p>
                            <span class="linner"></span>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="filter-items">
                            <li data-filter="" class="active"><span>All</span></li>
                            <li data-filter="web"><span>Web</span></li>
                            <li data-filter="portals"><span>Portals</span></li>
                            <li data-filter="mobile-apps"><span>Mobile Apps</span></li>
                        </ul>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div id="masonry" class="masonry">
                            <div class="grid-sizer col-md-3 col-sm-6 col-xs-12"></div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">Live Network</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/Live-Netwrk-31.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/Live-Netwrk-31.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.helpinghomesservices.in" target="_blank">HHS</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/helping-homes-services-web.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/helping-homes-services-web.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.sesgovernance.com" target="_blank">SES</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/ses-home-page.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/ses-home-page.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://leatherbagsnow.com/" target="_blank">Leather Bags Now</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/leatherbagsnow.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/leatherbagsnow.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item coming-soon col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">Look Venue</a></h5>
                                            <span class="filter-type">Mobile App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/lookvenue-ios.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/lookvenue-ios.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="portals" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://admin.helpinghomesservices.in/" target="_blank">HHS Portal</a></h5>
                                            <span class="filter-type">Portal</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/helping-homes-services-portal.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/helping-homes-services-portal.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">BBFS</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/bhaichung-bhutia-football-schools.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/bhaichung-bhutia-football-schools.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">MIT Media Lab</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/MIT-Media-Lab.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/MIT-Media-Lab.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item coming-soon col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">HHS</a></h5>
                                            <span class="filter-type">iphone App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/helping-homes-services-iphone-app.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/helping-homes-services-iphone-app.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">CherishTrip</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/cherish-trip-home-page.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/cherish-trip-home-page.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">Boikeno</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/Home-Boikeno.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/Home-Boikeno.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a target="_blank" href="https://play.google.com/store/apps/details?id=com.helpinghomeservices">HHS</a></h5>
                                            <span class="filter-type">Android App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/helping-homes-services-android-app.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/helping-homes-services-android-app.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.aajeevika.org/" target="_blank">Aajeevika</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/aajeevika-home-page.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/aajeevika-home-page.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a target="_blank" href="https://play.google.com/store/apps/details?id=com.reshotel">Reshotel</a></h5>
                                            <span class="filter-type">Mobile App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/reshotel-android.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/reshotel-android.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="portals" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="https://portal.sesgovernance.com/" target="_blank">SES Portal</a></h5>
                                            <span class="filter-type">Portal</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/portal-sesgovernance.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/portal-sesgovernance.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.reshotel.in/" target="_blank">Reshotel</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/reshotel.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/reshotel.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="web" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.lookvenue.com/" target="_blank">Look Venue</a></h5>
                                            <span class="filter-type">Web design</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/lookvenue.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/lookvenue.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item coming-soon col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">Look Venue</a></h5>
                                            <span class="filter-type">Mobile App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/lookvenue-android.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/lookvenue-android.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="portals" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="#">IC Training</a></h5>
                                            <span class="filter-type">Portal</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/ictraining.jpg','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/ictraining.jpg','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="portals" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="http://www.sesgovernance.com/patool/" target="_blank">SES PA Tool</a></h5>
                                            <span class="filter-type">Portal</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/sesgovernance-patool.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/sesgovernance-patool.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                            <div data-filter="mobile-apps" class="grid-item col-md-3 col-sm-6 col-xs-12 img-wrapper grid-spacing">
                                <div class="img-wrapper">
                                    <div class="img-caption">
                                        <div class="image-title">
                                            <h5><a href="https://play.google.com/store/apps/details?id=me.gingr" target="_blank">Gingr</a></h5>
                                            <span class="filter-type">Mobile App</span>
                                        </div>
                                        <div class="zoom">
                                            <?php
                                            echo anchor('assets/img/portfolio/gingr.png','<i class="icon-magnifying-glass icon-3x"></i>',array('data-pretty'=>"prettyPhoto",'class'=>'img-zoom','itemprop'=>'url'));
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    echo img(array('src'=>'assets/img/portfolio/gingr.png','class'=>'img-maxwidth portfolio-image','itemprop'=>'image'));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="subfooter">
                <p class="copyright">2015 &copy; Copyright <a itemprop="url" href="http://www.gkmit.co/">GKM IT</a> &#45; All Rights Reserved</p>
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
    echo script_tag("assets/js/masonry/masonry-3.1.4.js");
    echo script_tag("assets/js/masonry/masonry.filter.js");
    echo script_tag("assets/js/masonry/setting.js");
    echo script_tag("assets/js/prettyPhoto/jquery.prettyPhoto.js");
    echo script_tag("assets/js/prettyPhoto/setting.js");
    echo script_tag("assets/js/totop/jquery.ui.totop.js");
    echo script_tag("assets/js/totop/setting.js");
    echo script_tag("assets/js/custom.js");
    ?>
</div>
</body>
</html>
