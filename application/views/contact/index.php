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
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,500' rel='stylesheet' type='text/css'>
    <link rel="icon" href="<?php base_url(); ?>assets/ico/favicon.ico">
    <title>GKM IT | Contact</title>
    <?php
    echo link_tag("assets/css/bootstrap.min.css");
    echo link_tag("assets/css/icons.css");
    echo link_tag("assets/css/overwrite.css");
    echo link_tag("assets/css/prettyPhoto.css");
    echo link_tag("assets/css/style.css");
    echo link_tag("assets/skins/default.css");
    echo link_tag("assets/css/custom.css");
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
                        <li><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
                        <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="inner-header">
            <div class="inner-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3><i class="icon-envelope"></i> Contact</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <ol class="breadcrumb">
                                <li><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a itemprop="url" href="#" class="active">Contact</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 no-padd">
                    <div itemprop="hasMap" class="map contact-map" id="map"></div>
                </div>
            </div>
        </div>
        <div class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 col-sm-12">
                        <h5 class="head-title">Get in touch with us</h5>
                        <form id="contact_form" method="post" class="contact-form">
                            <div class="clearfix"></div>
                            <div id="sendmessage">
                                <div class="alert alert-info marginbot35">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Your message has been sent. Thank you!</strong><br />
                                </div>
                            </div>
                            <ul class="listForm">
                                <li class="first-list">
                                    <div class="contact-fields">
                                        <input class="form-control input-name input-lg" type="text" autocomplete="off" name="contact_name" id="contact_name" placeholder="Enter your full name . . ." />
                                        <span class="error-span" data-error-for="contact_name"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="second-list">
                                    <div class="contact-fields">
                                        <input class="form-control input-email input-lg" autocomplete="off" type="text" name="contact_email" id="contact_email"  placeholder="Enter your email address . . ."/>
                                        <span class="error-span" data-error-for="contact_email"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="full-list">
                                    <div class="contact-fields">
                                        <input class="form-control input-email input-lg" autocomplete="off" type="text" name="contact_subject" id="contact_subject"  placeholder="Enter your subject . . ."/>
                                        <span class="error-span" data-error-for="contact_subject"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="full-list">
                                    <div class="contact-fields">
                                        <textarea class="form-control input-message input-lg" rows="3" name="contact_message" id="contact_message" placeholder="Write something for us . . ."></textarea>
                                        <span class="error-span" data-error-for="contact_message"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="full-list">
                                    <input type="submit" value="Send message" class="btn btn-primary btn-lg" name="Submit" />
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-12" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <h5 class="head-title marginbot30">Address & Contact Info</h5>
                        <span itemprop="streetAddress"><i class="icon-map-pin"></i>&nbsp;&nbsp;343, Shiv Colony, Hiran Magri, Sector No. 6, Udaipur, Rajasthan - 313002</span><br/>
                        <span itemprop="telephone"><i class="icon-mobile2"></i>&nbsp;&nbsp;+91-7742338537</span> <br/>
                        <span itemprop="email"><i class="icon-envelop"></i>&nbsp;&nbsp;contact@gkmit.co</span><br/>
                        <span itemprop="sameAs"><i class="icon-globe"></i>&nbsp;&nbsp;http://www.gkmit.co</span>
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
    echo script_tag("assets/js/totop/jquery.ui.totop.js");
    echo script_tag("assets/js/totop/setting.js");
    ?>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
    <?php
    echo script_tag("assets/js/custom.js");
    echo script_tag("assets/js/jquery.validate.min.js");
    echo script_tag("assets/js/contact.js");
    ?>
    <script>
        jQuery(document).ready(function() {
            new GKM.Contact("<?php echo base_url(); ?>");
        });
    </script>
</div>
</body>
</html>
