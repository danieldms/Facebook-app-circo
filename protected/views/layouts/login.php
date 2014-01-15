<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Ntera - App Admin</title>

        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="images/admin/favicon.ico">
        <link rel="apple-touch-icon" href="images/admin/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="57x57" href="images/admin/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/admin/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/admin/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/admin/apple-touch-icon-precomposed.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- The roboto font is included from Google Web Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic">

        <!-- Bootstrap 2.3.2 is included in its original form, unaltered -->
        <link rel="stylesheet" href="../css/admin/bootstrap.css">

        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="../css/admin/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="../css/admin/main.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support them) -->
        <script src="../js/admin/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body class="login">
        <!-- Login Container -->
        <div id="login-container">
            <div id="login-logo">
                <a href="">
                    <img src="../images/admin/template/uadmin_logo.png" alt="logo">
                </a>
            </div>

            <? echo $content; ?>

        </div>
        <!-- END Login Container -->

        <!-- Jquery library from Google ... -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- ... but if something goes wrong get Jquery from local file -->
        <script>!window.jQuery && document.write(unescape('%3Cscript src="../js/admin/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="../js/admin/vendor/bootstrap.min.js"></script>

        <!--
        Include Google Maps API for global use.
        If you don't want to use  Google Maps API globally, just remove this line and the gmaps.js plugin from js/plugins.js (you can put it in a seperate file)
        Then iclude them both in the pages you would like to use the google maps functionality
        -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="../js/admin/plugins.js"></script>
        <script src="../js/admin/main.js"></script>

        <!-- Javascript code only for this page -->
        <script>
            $(function() {

                var loginForm = $('#login-form');
                loginForm.slideDown(450);

                // Hide login form
                $('.login-back').click(function() {
                    loginForm.slideUp(450);
                    loginButtons.slideDown(600);
                });

                // Don't let 'forgot pass' button submit the form
                $('#login-button-pass').click(function() {

                    // Forgot pass functionality goes here..

                    return false;
                });
            });
        </script>
    </body>
</html>