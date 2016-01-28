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
    <title>GKM IT</title>
    <?php
    echo link_tag('https://fonts.googleapis.com/css?family=Poppins:400,500');
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/icons.css');
    echo link_tag('assets/css/overwrite.css');
    echo link_tag('assets/css/owl.carousel.css');
    echo link_tag('assets/css/owl.theme.css');
    echo link_tag('assets/css/owl.transitions.css');
    echo link_tag('assets/css/prettyPhoto.css');
    echo link_tag('assets/css/jssor-slider.css');
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
    <div id="featured">
        <div class="featured-wrapper">
            <a itemprop="url" href="<?php echo base_url(); ?>portfolio" class="btn-rotate">View our portfolio</a>
            <a itemprop="url" href="<?php echo base_url(); ?>services" class="btn-rotate on-bottom">View our services</a>
            <div class="helf-featured">
                <ul class="ticker-image">
                    <li><?php echo img(array('src'=>'assets/img/slider/fade/web-designing.png','class'=>'img-maxwidth','itemprop'=>'image'));?></li>
                    <li><?php echo img(array('src'=>'assets/img/slider/fade/mobile-app-development.png','class'=>'img-maxwidth','itemprop'=>'image'));?></li>
                    <li><?php echo img(array('src'=>'assets/img/slider/fade/web-applications.png','class'=>'img-maxwidth','itemprop'=>'image'));?></li>
                    <li><?php echo img(array('src'=>'assets/img/slider/fade/product-development.png','class'=>'img-maxwidth','itemprop'=>'image'));?></li>
                </ul>
            </div>
            <div class="helf-featured helf-container">
                <h4>We do</h4>
                <div id="typer"></div>
                <a itemprop="url" href="<?php echo base_url(); ?>contact" class="btn btn-primary">Get in touch with us</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="wrapper">
        <nav class="navbar index-nav yamm">
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
                        <?php echo img(array('src'=>'assets/img/gkm-logo.png','itemprop'=>'logo')); ?>
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a itemprop="url" href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>services">Services</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>portfolio">Portfolio</a></li>
                        <li><a itemprop="url" href="<?php echo base_url(); ?>contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="about" class="containt about">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center marginbot30">
                        <div class="heading">
                            <p>Meet our Team</p>
                            <span class="linner"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="column-wrapper our-team" itemprop="employee" itemscope itemtype="https://schema.org/Person">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 team-wrapper">
                        <div id="team" class="owl-carousel">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/jeetesh.png','class'=>'img-responsive','itemprop'=>'image')); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Founder</span>
                                    <h3 itemprop="name">Jeetesh</h3>
                                    <p itemprop="description">
                                        Jeetesh obtained his graduation and post graduation degree in Coumputer Engineering from IIT Delhi focusing on computer networks and internet security. During his last few months in college he figured out his love and passion for creating products and solving problems with technology.
                                    </p>
                                    <p itemprop="description">
                                        He then spent next few years understanding the start up culture and different aspects of converting an idea into reality and the challenges it brings. He then moved on to founding GKM IT and has been consulting on different start ups while coming up with his own products in ecommerce environment. He loves spending time in mentoring people and trying out different technologies.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/jeetesh-sisodia/43/142/204"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/jpsisodia"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/vashishta.png','class'=>'img-responsive','itemprop'=>'image')); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Senior Developer</span>
                                    <h3 itemprop="name">Vashistha</h3>
                                    <p itemprop="description">
                                        Vashitha did his graduation in the field of electronics from IIT Delhi and was developing websites since his school days. He kept on pursuing his passion for web development in his college days as well and won many awards during inter college festivals for his out of the box thinking and coming up with quick protoypes for ideas for the entrepreneurship cell in his college.
                                    </p>
                                    <p itemprop="description">
                                        He loves playing with Javascript frameworks and his personal favourite his Node.JS for the time being atleast. He helped Jeetesh in founding GKM IT and has been a strong pillar in company’s growth and business development. He loves to play table tennis in his spare time.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/vashistha-aggarwal/49/413/a38"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/vishu87"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/ravindra.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Full Stack Developer</span>
                                    <h3 itemprop="name">Ravindra</h3>
                                    <p itemprop="description">
                                        Ravindra did his bachelor's degree from SKIT, Jaipur in Information Technology back in 2010 and then progressed to training engineering students for HCL CDC, Udaipur for two years. He trained students and provided career mentorship for them in technologies like JAVA, PHP etc.
                                    </p>
                                    <p itemprop="description">
                                        He then decided to try his hand at web development and since then has been delivering scalable, cross browser complaint and fluid web applications. Lately he has found his new love for android development and is now developing android applications and hacking around hybrid applications. While his major strength lies in frontend engineering he is filling up his arsenal with new technologies everyday.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://in.linkedin.com/pub/ravindra-singh/92/83a/534"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/RavindraGkm"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/pankaj.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Android Developer</span>
                                    <h3 itemprop="name">Pankaj</h3>
                                    <p itemprop="description">
                                        Pankaj did his masters in Computer Applications from MLSU, Udaipur in 2013 and did his internship from Unico Solutions as an android developer and then moved on to work for Insessor Technologies with the same profile. He then decided to join GKM IT as an android developer and has been delivering complex android applications on different projects.
                                    </p>
                                    <p itemprop="description">
                                        He loves to keep himself occupied with Chess, occassionally snooker and spending time on social causes.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/pankaj-kumawat/56/929/377"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/pankajk7"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/pradeep.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">ios Developer</span>
                                    <h3 itemprop="name">Pradeep</h3>
                                    <p itemprop="description">
                                        Pradeep did his masters in Computer Applications from CMRIMS, Bangalore in 2014 and joined GKM IT as a fresher and learned web development skills and created a proxy report creation and management software for a financial client and ensured client statisfaction. He then moved on to iOS development and self trained himself on Swift - 1.2 and 2.0.
                                    </p>
                                    <p class="description">
                                        He is the prankster in GKM IT and always has something up his sleeve to cheer up people.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/pradeep-chauhan/39/526/225"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/pradeep-chauhan"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/ronak.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Full Stack Developer</span>
                                    <h3 itemprop="name">Ronak</h3>
                                    <p itemprop="description">
                                        Ronak completed his Masters in Computer Applications from MLSU, Udaipur and then dived head on into live projects undergoing in GKM IT and kept on delivering under pressure while growing his skills as an engineer.
                                    </p>
                                    <p itemprop="description">
                                        He is a full-stack web developer specialising in Ruby on Rails. He strongly believes in agile methodologies and test-driven development. He is a polyglot programmer who strives to learn new technologies and likes dealing with the wholistic view in any project.
                                    </p>
                                    <p itemprop="description">
                                        He is startup enthusiastic and loves to learn new technologies and convert them to business solutions. He loves playing sports especially volleyball and table tennis.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/in/ronaktaldar"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/Ronak5"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/sonal.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Full Stack Developer</span>
                                    <h3 itemprop="name">Sonal</h3>
                                    <p itemprop="description">
                                        Sonal completed her Masters in Computer Applications from MLSU, Udaipur and then underwent a product training from Future Group’s retail segment in Ahmedabad. Having joined GKM IT as a junior developer, she quickly picked up all essential web development skills and has been constantly growing. She is currently responsible for design and development of core features on GKMIT's central project - a highly scalable distributed RoR based hotel system.
                                    </p>
                                    <p itemprop="description">
                                        Travel and reading are her preferred choice for leisure.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/sonal-bhanawat/63/53a/852"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/SonalBhanawat"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php echo img(array('src'=>'assets/img/team/nik.jpg','class'=>'img-responsive','itemprop'=>"image")); ?>
                                </div>
                                <div class="col-md-9 team-detail">
                                    <span itemprop="jobTitle">Consultant</span>
                                    <h3 itemprop="name">Nikhil</h3>
                                    <p itemprop="description">
                                        Nikhil has worked within agile frameworks; spawning teams, mentoring developers and analysts, and consulting on distributed web & mobile products for over 6 years. Being passionate about game changing ideas & large scale value creation, he understands business vision, and helps execute perfect applications from start to finish, on small and large projects.
                                    </p>
                                    <div class="team-network">
                                        <a itemprop="url" target="_blank" href="https://www.linkedin.com/pub/nikhil-vallishayee/15/906/819"><i class="icon-linkedin icon-3x"></i></a>
                                        <a itemprop="url" target="_blank" href="https://github.com/nikhilvallishayee"><i class="icon-github icon-3x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <section class="containt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="heading">
                            <h3>Our <span>Testimonials</span></h3>
                            <p>Satisfied Clients, Let’s See What Some Have To Say?</p>
                            <span class="linner"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="recent-blog" class="owl-carousel">
                            <div class="row recent-post-wrapper">
                                <div class="col-md-12 col-xs-12">
                                    <div style="position: relative; ">
                                        <article class="client-say">
                                            <p>
                                                Working with GKM IT doesn’t feel as if working with an offsite/offshore development firm; it feels as if we have gained an internal team of the company. Their highly skilled professionals with exceptional business understanding and work ethics immensely enhance product value and overall vision of the project.
                                            </p>
                                        </article>
                                        <div class="arrows"></div>
                                    </div>
                                    <div class="center">
                                        <i class="icon-user"></i> <span>Ankit Lohmore</span>, CEO, CherishTrip
                                    </div>
                                </div>
                            </div>
                            <div class="row recent-post-wrapper">
                                <div class="col-md-12 col-xs-12">
                                    <div style="position: relative;">
                                        <article class="client-say">
                                            <p>
                                                We have entrusted Vashistha and Jeetesh at GKM IT with the development and design of web interfaces and online CRM systems of all 3 of our initiatives. Their professionalism, timeliness, creativity and attention to detail have been integral to our progress.
                                            </p>
                                        </article>
                                        <div class="arrows"></div>
                                    </div>
                                    <div class="center">
                                        <i class="icon-user"></i> <span>Anurag Khilnani</span>, Founder, Bhaichung Bhutia Football Schools
                                    </div>
                                </div>
                            </div>
                            <div class="row recent-post-wrapper">
                                <div class="col-md-12 col-xs-12">
                                    <div style="position: relative;">
                                        <article class="client-say">
                                            <p>
                                                GKM developed the web-site for the MIT Media Lab India Initiative. Great team, incredibly responsive. It was amazing fun working with Jeetesh. We hope to continue our relationship in the future!
                                            </p>
                                        </article>
                                        <div class="arrows"></div>
                                    </div>
                                    <div class="center">
                                        <i class="icon-user"></i> <span>Kshitij Marwah</span>, Head, MIT Media Lab India Initiative
                                    </div>
                                </div>
                            </div>
                            <div class="row recent-post-wrapper">
                                <div class="col-md-12 col-xs-12">
                                    <div style="position: relative;">
                                        <article class="client-say">
                                            <p>
                                                Jeetesh managed an important project in our company to register and follow up quotations in the EMEA region in a responsive web application. He showed a very result oriented attitude together with the a great experience in agile project methodologies. His ability to understand our needs and to translate into a data model and software design is remarkable. He managed his excellent team to provide the delivery in time AND within budget. I can recommend Jeetesh and his company to every IT manager who is looking for a reliable Indian partner to deliver high quality software solutions.
                                            </p>
                                        </article>
                                        <div class="arrows"></div>
                                    </div>
                                    <div class="center">
                                        <i class="icon-user"></i> <span>Mario Roegiers</span>, IT Manager, EMEA - Americas at CG Global
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="subfooter">
                <p class="copyright">2015 &copy; Copyright <a itemprop="url" href="http://www.gkmit.co/">GKM IT</a> &#45; All Rights Reserved</p>
            </div>
        </footer>
    </div>
    <?php
    echo script_tag('assets/js/jquery.min.js');
    echo script_tag('assets/js/bootstrap.min.js');
    echo script_tag('assets/js/ie8-responsive-file-warning.js');
    echo script_tag('assets/js/ie-emulation-modes-warning.js');
    echo script_tag('assets/js/html5shiv.min.js');
    echo script_tag('assets/js/respond.min.js');
    echo script_tag('assets/js/ie10-viewport-bug-workaround.js');
    echo script_tag('assets/js/jquery.easing.1.3.js');
    echo script_tag('assets/js/sticky/jquery.sticky.js');
    echo script_tag('assets/js/sticky/setting.js');
    echo script_tag('assets/js/owlcarousel/owl.carousel.js');
    echo script_tag('assets/js/owlcarousel/setting.js');
    echo script_tag('assets/js/prettyPhoto/jquery.prettyPhoto.js');
    echo script_tag('assets/js/prettyPhoto/setting.js');
    echo script_tag('assets/js/ticker/ticker.js');
    echo script_tag('assets/js/ticker/setting.js');
    echo script_tag('assets/js/typer/jquery.typer.js');
    echo script_tag('assets/js/typer/setting.js');
    echo script_tag('assets/js/totop/jquery.ui.totop.js');
    echo script_tag('assets/js/totop/setting.js');
    echo script_tag('assets/js/custom.js');
    ?>
</div>
</body>
</html>
