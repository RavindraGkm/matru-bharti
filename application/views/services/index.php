<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="web development Udaipur, website development udaipur, web development company in udaipur, website development company in udaipur">
    <meta name="description" content="Web Development Company in Udaipur,India. GKM IT Pvt. Ltd. is leading website development and web services in Udaipur." />
    <meta name="robots" content="index,follow" />
    <meta name="publisher" content="GKM IT Pvt. Ltd" />
    <meta name="author" content="GKM IT Pvt. Ltd" />
    <meta name="language" content="english" />
    <link rel="icon" href="<?php base_url(); ?>assets/ico/favicon.ico">
    <title>GKM IT | Services</title>
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
                        <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
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
                            <h3><i class="icon-tools"></i> Services</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <ol class="breadcrumb">
                                <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a itemprop="url" href="#" class="active">Services</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="containt">
            <div class="container">
                <div class="row marginbot30">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading">
                            <h3>our <span>services</span></h3>
                            <p>What can we do for your business</p>
                            <span class="linner"></span>
                        </div>
                        <p itemprop="description">
                            GKM IT is a family of engineers, designers and innovators with expertise in outsourced product development and custom software development. We are consistently delivering for the past three years - outsourcing solutions, quality software products, mobile applications and solutions for start-ups, mid-size and large enterprises worldwide. We strongly belive in agile methodologies to ensure quality work and client satisfaction.
                        </p>
                    </div>
                </div>
                <div class="row marginbot80 about">
                    <div class="col-md-3 column-box">
                        <i class="icon-desktop icon-primary icon-5x icon-center"></i>
                        <span class="sparator-line on-right"></span>
                        <h4 class="what-do-headings">Web Desigining</h4>
                        <ul class="what-do-list">
                            <li>Adobe photoshop cs6</li>
                            <li>Html 5/CSS 3/JS</li>
                            <li>Prototyping/Wireframing</li>
                            <li>Bootstrap 3.0</li>
                            <li>Angular JS</li>
                            <li>Web 3.0</li>
                        </ul>
                    </div>
                    <div class="col-md-3 column-box">
                        <i class="icon-desktop icon-primary icon-5x icon-center"></i>
                        <span class="sparator-line on-right"></span>
                        <h4 class="what-do-headings">Web Application <br/> Development</h4>
                        <ul class="what-do-list">
                            <li>Ruby on Rails/ Node JS/Python/PHP</li>
                            <li>MVC</li>
                            <li>Agile Development</li>
                            <li>Mysql/Postgre Sql/MongoDB</li>
                            <li>Restful API's</li>
                        </ul>
                    </div>
                    <div class="col-md-3 column-box">
                        <i class="icon-tablet icon-primary icon-5x icon-center"></i>
                        <span class="sparator-line on-right"></span>
                        <h4 class="what-do-headings">Mobile Application <br/> Development</h4>
                        <ul class="what-do-list">
                            <li>Android</li>
                            <li>ios - Swift 1.2, 2.0</li>
                            <li>Hybrid Apps</li>
                        </ul>
                    </div>
                    <div class="col-md-3 column-box">
                        <i class="icon-cloud icon-primary icon-5x icon-center"></i>
                        <span class="sparator-line on-left"></span>
                        <h4 class="what-do-headings">Product Cosulting</h4>
                        <ul class="what-do-list">
                            <li>Business idea to technology translation</li>
                            <li>Prototyping/MVP</li>
                            <li>Business Analytics</li>
                            <li>Market Testing</li>
                            <li>Stagewise Releases</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row services">
                    <div class="col-md-12">
                        <div class="heading">
                            <p class="heads">We Are Dedicated To Our Clients</p>
                            <span class="linner"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="client-wrapper padding-clear">
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/mit.jpg",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/ses.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/bbfs.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/cherishtrip.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/cherry_art.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/aajeevika.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/cg.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/reshotel.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                            <div class="client-logo">
                                <a href="#" class="logo-link">
                                    <?php echo img(array('src'=>"assets/img/clients/leather-bags-now.png",'class'=>"client img-responsive",'itemprop'=>'image')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 top-30">
                        <div class="presentation-wrapper">
                            <section class="presentation">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <h2 class="presentation-heading">Checkout our web presentation to know more about us and our process</h2>
                                    </div>
                                    <div class="col-md-3 col-sm-12 center">
                                        <a itemprop='url' href="http://www.gkmit.co/presentation/" target="blank" class="continue btn btn-primary btn-block btn-web">Web Presentation</a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</div>
</body>
</html>
