<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="images/admin/favicon.ico">
    <link rel="apple-touch-icon" href="images/admin/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/admin/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/admin/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/admin/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/admin/apple-touch-icon-precomposed.png">
    <!-- END Icons -->

	<!-- blueprint CSS framework >
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/estilo.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic">
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	
	<?  $baseUrl = Yii::app()->baseUrl; 
        $cs = Yii::app()->getClientScript();
	  	$cs->registerCssFile("http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic");
	  	$cs->registerCssFile($baseUrl."/css/admin/bootstrap.css");
	  	$cs->registerCssFile($baseUrl."/css/admin/main.css");
	  	$cs->registerCssFile($baseUrl."/css/admin/plugins.css");

	  	$cs->registerCssFile($baseUrl."/css/admin/themes.css");

        $cs->registerScriptFile($baseUrl.'/js/admin/vendor/jquery-1.9.1.min.js');
	  	$cs->registerScriptFile($baseUrl.'/js/admin/vendor/modernizr-2.6.2-respond-1.1.0.min.js');	  	
	  	$cs->registerScriptFile($baseUrl.'/js/admin/vendor/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/admin/plugins.js');
        $cs->registerScriptFile($baseUrl.'/js/admin/jquery.flot.navigate.js');
	  	$cs->registerScriptFile($baseUrl.'/js/admin/main.js');

  	?>


	<title>Administrador - Votação</title>
</head>

<body>
       <!-- Page Container -->
        <div id="page-container">
            <!-- Header -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
            <header class="navbar navbar-inverse">
                <!-- Navbar Inner -->
                <div class="navbar-inner remove-radius remove-box-shadow">
                    <!-- div#container-fluid -->
                    <div class="container-fluid">
                        <!-- Mobile Navigation, Shows up  on smaller screens -->
                        <ul class="nav pull-right visible-phone visible-tablet">
                            <li class="divider-vertical remove-margin"></li>
                            <li>
                                <!-- It is set to open and close the main navigation on smaller screens. The class .nav-collapse was added to aside#page-sidebar -->
                                <a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
                                    <i class="icon-reorder"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- END Mobile Navigation -->

                        <!-- Logo -->
                        <?php echo CHtml::link('<img src="../images/admin/template/logo.png" alt="logo">', array('admin/index'), array('class' => 'brand')); ?>
                        <!-- Loading Indicator, Used for demostrating how loading of widgets could happen, check main.js - uiDemo() -->
                        <div id="loading" class="hide pull-left"><i class="icon-certificate icon-spin"></i></div>

                        <!-- Header Widgets -->
                        <!-- You can create the widgets you want by replicating the following. Each one exists in a <li> element -->
                        <ul id="widgets" class="nav pull-right">

                            <!-- Just a divider -->
                            <li class="divider-vertical remove-margin"></li>

                            <!-- User Menu -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="../images/admin/template/avatar.png" alt="avatar"> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                       <?php echo CHtml::link('<i class="icon-lock"></i> Log out', array('admin/logout')); ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Menu -->
                        </ul>
                        <!-- END Header Widgets -->
                    </div>
                    <!-- END div#container-fluid -->
                </div>
                <!-- END Navbar Inner -->
            </header>
            <!-- END Header -->

            <!-- Inner Container -->
            <div id="inner-container"><!-- Sidebar -->
                <aside id="page-sidebar" class="nav-collapse collapse">
                    <!-- Sidebar search -->
                    <form id="sidebar-search" action="page_search_results.html" method="post">
                        <div class="input-append">
                            <input type="text" placeholder="Search.." class="remove-box-shadow remove-transition remove-radius">
                            <button><i class="icon-search"></i></button>
                        </div>
                    </form>
                    <!-- END Sidebar search -->

                    <!-- Primary Navigation -->
                    <nav id="primary-nav">
                        <ul>
                            <li>
                                <?php echo CHtml::link('<i class="icon-fire"></i>Dashboard', array('admin/index'), array('class' => $this->action->Id=='index'?"active":false )); ?>
                            </li>
                        </ul>
                    </nav>
                    <!-- END Primary Navigation -->
                </aside>
                <!-- END Sidebar -->
                <!-- Page Content -->
                <div id="page-content">
					<?php echo $content; ?>
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
                <footer>
                    <span id="year-copy"></span> &copy; <strong><a href="http://ntera.com.br">uAdmin 1.3.2</a></strong> - Crafted with <i class="icon-heart"></i> by <strong><a href="http://ntera.com.br" target="_blank">Ntera Studio</a></strong>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Inner Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="icon-chevron-up"></i></a>

        <!-- User Modal Settings, appears when clicking on 'User Settings' link found on user dropdown menu (header, top right) -->
        <div id="modal-user-settings" class="modal hide">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Profile Settings</h4>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Content -->
            <div class="modal-body">
                <!-- Example Tabs, initialized at main.js - uiDemo() -->
                <!-- Tab links -->
                <ul id="example-user-tabs" class="nav nav-tabs">
                    <li class="active"><a href="#example-user-tabs-account"><i class="icon-cogs"></i> Account</a></li>
                    <li><a href="#example-user-tabs-profile"><i class="icon-user"></i> Profile</a></li>
                </ul>
                <!-- END Tab links -->

                <!-- END Tab Content -->
                <div class="tab-content">
                    <!-- First Tab -->
                    <div class="tab-pane active" id="example-user-tabs-account">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> Password changed!
                        </div>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="example-user-username">Username</label>
                                <div class="controls">
                                    <input type="text" id="example-user-username" class="disabled" value="administrator" disabled="">
                                    <span class="help-block">You can't change your username!</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-pass">Password</label>
                                <div class="controls">
                                    <input type="password" id="example-user-pass">
                                    <span class="help-block">if you want to change your password enter your current for confirmation!</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-newpass">New Password</label>
                                <div class="controls">
                                    <input type="password" id="example-user-newpass">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END First Tab -->

                    <!-- Second Tab -->
                    <div class="tab-pane" id="example-user-tabs-profile">
                        <h5 class="page-header-sub hidden-phone">Image</h5>
                        <div class="form-horizontal hidden-phone">
                            <div class="control-group">
                                <img src="../images/admin/placeholders/image_dark_120x120.png" alt="image">
                            </div>
                            <div class="control-group">
                                <form action="index.html" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form class="form-horizontal">
                            <h5 class="page-header-sub">Details</h5>
                            <div class="control-group">
                                <label class="control-label" for="example-user-firstname">Firstname</label>
                                <div class="controls">
                                    <input type="text" id="example-user-firstname" value="John">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-lastname">Lastname</label>
                                <div class="controls">
                                    <input type="text" id="example-user-lastname" value="Doe">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-gender">Gender</label>
                                <div class="controls">
                                    <select id="example-user-gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-birthdate">Birthdate</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-birthdate" class="input-small input-datepicker">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-skills">Skills</label>
                                <div class="controls">
                                    <select id="example-user-skills" multiple="multiple" class="select-chosen">
                                        <option selected>html</option>
                                        <option selected>css</option>
                                        <option>javascript</option>
                                        <option>php</option>
                                        <option>mysql</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-bio">Bio</label>
                                <div class="controls">
                                    <textarea id="example-user-bio" class="textarea-elastic" rows="3">Bio Information..</textarea>
                                </div>
                            </div>
                            <h5 class="page-header-sub">Social</h5>
                            <div class="control-group">
                                <label class="control-label" for="example-user-fb">Facebook</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-fb">
                                        <span class="add-on"><i class="icon-facebook"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-twitter">Twitter</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-twitter">
                                        <span class="add-on"><i class="icon-twitter"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-pinterest">Pinterest</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-pinterest">
                                        <span class="add-on"><i class="icon-pinterest"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="example-user-github">Github</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input type="text" id="example-user-github">
                                        <span class="add-on"><i class="icon-github"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Second Tab -->
                </div>
                <!-- END Tab Content -->
            </div>
            <!-- END Modal Content -->

            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i> Close</button>
                <button class="btn btn-success"><i class="icon-spinner icon-spin"></i> Save changes</button>
            </div>
            <!-- END Modal footer -->
        </div>
        <!-- END User Modal Settings -->
    </body>
</html>
