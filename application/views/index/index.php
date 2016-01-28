
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matru Bharti</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <?php
        echo link_tag('assets/css/animate.css');
        echo link_tag('assets/css/material-design-iconic-font.min.css');
        echo link_tag('assets/css/app.min.1.css');
        echo link_tag('assets/css/app.min.2.css');
        echo link_tag('assets/css/login_custom.css');
    ?>

</head>

<body class="login-content">
<div class="container">
    <div class="row" id="text"><!-- start of row text -->
        <div class="col-md-12">
            <h1 class="login-h2">Matru Bharti</h1>
            <p>This website is just a plateform where two families can meet each other and know each other. So lets register and login to view all profiles.</p>
        </div>
    </div><!-- end of row text -->

    <div class="row countdown">
        <div class="col-md-12">
            <!--Login -->
            <div class="lc-block toggled" id="l-login">
                <h4 class="login-title">Login into your account</h4>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" class="form-control" name="txt_email" id="txt_email" placeholder="Email">
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line">
                        <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Password">
                    </div>
                </div>
                <a id="btn-login" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>
                <ul class="login-navigation">
                    <li data-block="#l-register" class="bgm-red">Register</li>
                    <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
                </ul>
            </div>
            <!--Register-->
            <div class="lc-block" id="l-register">
                <h4 class="register-title">Register new user</h4>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line">
                        <input type="text" id="txt_reg_email" name="txt_reg_email" class="form-control" placeholder="Email Address">
                    </div>
                </div>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line">
                        <input type="password" id="txt_reg_pass" name="txt_reg_pass" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                    <div class="fg-line">
                        <input type="text" id="txt_mobile" name="txt_mobile" class="form-control" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="clearfix"></div>

                <a id="btn-register" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

                <ul class="login-navigation">
                    <li data-block="#l-login" class="bgm-green">Login</li>
                    <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
                </ul>
            </div>
            <!-- Forgot Password -->
            <div class="lc-block" id="l-forget-password">
                <p class="text-left forgot-password-text">If you forgot your password don't panic. Its very easy to get you password back. Just type your mail id and we will send your password on your mail id. If you forgot your mail id then plz contact on 8739870004.</p>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <a href="" class="btn btn-forgot-pass btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

                <ul class="login-navigation">
                    <li data-block="#l-login" class="bgm-green">Login</li>
                    <li data-block="#l-register" class="bgm-red">Register</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1 class="c-white">Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="img/browsers/chrome.png" alt="">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="img/browsers/firefox.png" alt="">
                    <div>Firefox</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<?php
    echo script_tag('assets/js/jquery.min.js');
    echo script_tag('assets/js/bootstrap.min.js');
    echo script_tag('assets/js/waves.min.js');
    echo script_tag('assets/js/jquery.placeholder.min.js');
    echo script_tag('assets/js/register/registration.js');
    echo script_tag('assets/js/login/login.js');
?>


</body>
<script type="text/javascript">
    $(document).ready(function(){
        new MBJS.Login("<?php echo base_url(); ?>");
    });
</script>
</html>