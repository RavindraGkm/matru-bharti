<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spotlight - App Landing Template</title>

    <!-- CSS Plugins -->
    <?php
    echo link_tag('assets/css/jquery.fullpage.min.css');
    echo link_tag('assets/css/animate.min.css');
    echo link_tag('assets/css/font-awesome.min.css');
    echo link_tag('assets/css/styles.css');
    echo link_tag('assets/css/setup.css');
    ?>
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

</head>

<body>

<!-- MAIN CONTENT
================================================== -->

<!-- Background Image -->
<div class="bg-image"></div>


<!-- Background Colors -->
<div class="bg-colors hidden" data-colors="#568CD3,#D3744C,#389E86,#9356D3,#D35D56,#587EA0,#518E7E"></div>


<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#section_home">Manthan</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">

            <a href="#section_download" class="btn btn-lg navbar-right navbar-btn">
                <i class="fa fa-cloud-download"></i> Download
            </a>
            <ul class="nav navbar-nav navbar-right menu">
                <li data-menuanchor="section_home">
                    <a href="#section_home">Home</a>
                </li>
                <li data-menuanchor="section_login">
                    <a href="#section_login">Login</a>
                </li>
                <li data-menuanchor="section_register">
                    <a href="#section_register">Register</a>
                </li>
                <li data-menuanchor="section_contact_us">
                    <a href="#section_contact_us">Contact Us</a>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->

    </div><!-- /.container -->
</nav>


<!-- Side menu -->
<div class="side-menu hidden-xs hidden-sm">
    <ul class="menu">
        <li data-menuanchor="section_home">
            <a href="#section_home"></a>
        </li>
        <li data-menuanchor="section_login">
            <a href="#section_login"></a>
        </li>
        <li data-menuanchor="section_register">
            <a href="#section_register"></a>
        </li>
        <li data-menuanchor="section_contact_us">
            <a href="#section_contact_us"></a>
        </li>
    </ul>
</div>


<!-- Social links -->
<div class="social-links hidden-xs hidden-sm">
    <ul>
        <li>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
        </li>
    </ul>
</div>


<!-- Devices -->
<div class="device__container hidden-xs">

    <!-- iPhone -->
    <div class="iphone__container black">

        <!-- Slides -->
        <div class="iphone__screen">
            <div class="device__slides">
                <img src="<?php echo base_url('assets/img/android.png'); ?>" alt="...">
            </div>
        </div>

    </div>

</div> <!-- / .device__container -->


<!-- Sections -->
<div id="fullpage">

    <!-- Welcome -->
    <section data-anchor="section_home">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-6">

                    <h1 class="heading" data-animate-in="animateUpDown">
                        Welcome to manthan <br />
                        a place for Authors
                    </h1>

                    <p class="delay_1" data-animate-in="animateUpDown">
                        Matter to be placed given by nitin ji.
                    </p>
                    <a href="#" class="btn btn-lg btn-primary delay_2" data-animate-in="animateUpDown">
                        <i class="fa fa-key"></i> Login
                    </a>
                    <a href="#" class="btn btn-lg btn-primary delay_2" data-animate-in="animateUpDown">
                        <i class="fa fa-user-plus"></i> Register
                    </a>

                </div>
            </div> <!-- / .row -->
        </div><!-- / .container -->
    </section>

    <!-- Features -->
    <section data-anchor="section_login">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-6">

                    <h1 class="heading" data-animate-in="animateUp">
                        Showcase your <br />
                        advantages with style
                    </h1>

                    <p class="delay_1" data-animate-in="animateUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente doloribus ratione fugiat, itaque fuga minus tenetur, quae officia doloremque a expedita maxime magnam.
                    </p>

                    <ul class="list-ticked">
                        <li class="delay_2" data-animate-in="animateUp">
                            <i class="fa fa-check"></i> Lorem ipsum dolor sit amet
                        </li>
                        <li class="delay_2_1" data-animate-in="animateUp">
                            <i class="fa fa-check"></i> Consectetur adipisicing elit
                        </li>
                        <li class="delay_2_2" data-animate-in="animateUp">
                            <i class="fa fa-check"></i> Mollitia magnam aliquam eveniet
                        </li>
                    </ul>

                </div>
            </div> <!-- / .row -->
        </div><!-- / .container -->
    </section>

    <!-- Text block -->
    <section data-anchor="section_register">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-6">

                    <h2 class="heading" data-animate-in="animateUp">
                        Great way to<br />
                        present your product
                    </h2>

                    <p class="delay_1" data-animate-in="animateUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo vero culpa, nisi veniam modi quam voluptatum. Ipsa voluptatum quasi nulla, asperiores autem!
                    </p>
                    <p class="delay_2" data-animate-in="animateUp">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente doloribus ratione fugiat, itaque fuga.
                    </p>


                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- Contact -->
    <section data-anchor="section_contact_us">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-6">

                    <h2 class="heading" data-animate-in="animateUp">
                        Contact us <br />
                        for more information
                    </h2>

                    <!-- Alert message -->
                    <div class="alert" id="form_message" role="alert"></div>

                    <!-- Please carefully read the README.txt file in order to setup the PHP contact form properly -->

                    <form id="form_sendemail" class="delay_1" data-animate-in="animateUp">

                        <div class="form-group">
                            <label class="sr-only" for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" data-original-title="" title="">

                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" data-original-title="" title="">

                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="message">Message</label>
                            <textarea name="message" class="form-control" rows="3" id="message" placeholder="Message"></textarea>

                            <span class="help-block"></span>
                        </div>

                        <!-- reCAPTCHA -->
                        <div class="form-group" id="form-captcha">

                            <div class="g-recaptcha" data-sitekey="6LcU9QETAAAAABOKm4BoKrhzTvdIsrzXTsl4sgpY"></div>

                            <span class="help-block"></span>
                        </div>
                        <!-- /reCAPTCHA -->

                        <button type="submit" class="btn btn-primary">
                            Send Message
                        </button>

                    </form>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

</div> <!-- / #fullpage -->


<!-- RESOURCES
================================================== -->

<!-- JS Global -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php
echo script_tag('assets/js/jquery.fullpage.min.js');
echo script_tag('assets/js/bootstrap.min.js');
echo script_tag('https://www.google.com/recaptcha/api.js');
echo script_tag('assets/js/contact.js');
echo script_tag('assets/js/custom.js');
?>
</body>
</html>