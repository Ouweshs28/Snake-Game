<?php

//Generates Header
// First argument takes the page title to display in the head
// Second argument is used for the css file name and for reference what page is it currently generating the head
function generateHeader($pageTitle, $pagecss)
{
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->';
    echo '<title>' . $pageTitle . '</title>';
    echo '<!-- Bootstrap -->';
    if ($pagecss == 'home') {
        // home page has different paths for files so if it is home
        echo '<link href="common/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Common CSS -->';
        echo '<link href="common/css/common.css" rel="stylesheet" type="text/css">';
        echo '<!-- ' . $pageTitle . 'CSS -->';
        echo '<link href="css/' . $pagecss . '-style.css" rel="stylesheet" type="text/css">';
        echo ' <!-- Snake Fav ICON -->';
        echo '<link rel="shortcut icon" type="image/png" href="common/img/snake_icon.ico"/>';
    } else {
        //other pages locations
        echo '<link href="../common/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Common CSS -->';
        echo '<link href="../common/css/common.css" rel="stylesheet" type="text/css">';
        echo '<!-- ' . $pageTitle . 'CSS -->';
        echo '<link href="css/' . $pagecss . '-style.css" rel="stylesheet" type="text/css">';
        echo ' <!-- Snake Fav ICON -->';
        echo '<link rel="shortcut icon" type="image/png" href="../common/img/snake_icon.ico"/>';
    }
    if (($pagecss == 'login') OR ($pagecss == 'register')) {
        //Common between login and register pages
        echo '<link href="../common/css/select2/select2.min.css" rel="stylesheet" media="all">';
    }
    if ($pagecss == 'login') {
        //Login extra css
        echo '<!-- Vendor CSS-->';
        echo '<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">';
        echo '<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/util.css">';
    }
    if ($pagecss == 'register') {
        // Register extra css
        echo '<!-- Icons font CSS-->';
        echo '<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">';
        echo '<!-- Vendor CSS-->';
        echo '<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">';
    }
    echo '</head>';
    echo '<body>';
}

/* Outputs NavigationBar with corresponding link */
function outputNavBar($pageName)
{
    //  Common Navigation Part
    echo '<!--Navigation Bar-->';
    echo '<nav class="navbar fixed-top" id="navBar">';
    if ($pageName == 'Home') { // home has a different paths
        echo '<a class="navbar-brand" href="index.php">
        <img alt="snake icon" class="d-inline-block align-top" src="common/img/snake-icon.png"> Snake
    </a>';
    } else { // other pages
        echo '<a class="navbar-brand" href="../index.php">
        <img alt="snake icon" class="d-inline-block align-top" src="../common/img/snake-icon.png"> Snake
    </a>';
    }

    echo '<ul class="navbar-nav ml-auto">
        <li class="nav-item">';


    $linkNames = array("Home", "Score", "Login"); // Arrays of button names
    $linkFolderHome = array("", "score/", "login/"); //folder path for home page
    $linkFolder = array("../", "../score/", "../login/"); //path for other pages
    $linkFiles = array("index.php", "score.php", "login.php"); // file names


    for ($x = 0; $x < count($linkNames); $x++) { // loop though the button names
        echo '<a class="btn navbar-btn navButton"';
        if ($linkNames[$x] == $pageName) { // if the matches the current page it adds a selected class to button
            echo 'id="activeNavBtn"';
        }
        if ($pageName == 'Home') { // if it is the home page
            if ($x == 0) { // the first button is the home itself and it has no folder
                echo 'href="' . $linkFiles[$x] . '">' . $linkNames[$x] . '</a>';
            } else { // concatenating  folder name and file name

                echo 'href="' . $linkFolderHome[$x] . $linkFiles[$x] . '">' . $linkNames[$x] . '</a>';
            }
        } else { //other pages
            echo 'href="' . $linkFolder[$x] . $linkFiles[$x] . '">' . $linkNames[$x] . '</a>';
        }
    }
    echo '</li>
    </ul>
</nav>';
}

//Function to generate JS Libraries
//Takes page css as reference to know which libraries to generate on each one
// same logic used in navbar is being applied as each page has some libraries dependencies
function generateCommonJS($pagecss)
{
    if ($pagecss == 'home') {
        echo '<!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->';
        echo '<script src="common/js/jquery/jquery.min.js"></script>';
        echo '<!-- Include all compiled plugins (below), or include individual files as needed -->';
        echo '<script src="common/js/bootstrap/bootstrap.min.js"></script>';

    } else {
        echo '<!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->';
        echo '<script src="../common/js/jquery/jquery.min.js"></script>';
        echo '<!-- Include all compiled plugins (below), or include individual files as needed -->';
        echo '<script src="../common/js/bootstrap/bootstrap.min.js"></script>';

    }
    if (($pagecss == 'login') OR ($pagecss == 'register')) {
        echo '<script src="../common/js/select2/select2.min.js"></script>';
    }

    if ($pagecss == 'login') {
        echo '<script src="js/popper.js"></script>';
        echo '<!-- Vendor JS-->';
        echo '<script src="vendor/tilt/tilt.jquery.min.js"></script>';
        echo '<script >';
        echo "$('.js-tilt').tilt({";
        echo 'scale: 1.1';
        echo '})';
        echo '</script>';
        echo '<!-- Main JS-->';
        echo '<script src="js/main.js"></script>';
    }

    if ($pagecss == 'register') {
        echo '<script src="vendor/datepicker/moment.min.js"></script>';
        echo '<script src="vendor/datepicker/daterangepicker.js"></script>';
        echo '<!-- Main JS-->';
        echo '<script src="js/global.js"></script>';
    }
    echo '</html>';
}


//Function to generate footer
//Optional parameter to check if it is the home page
// path for home and others are different
function generateFooter($isHome = null)
{
    if ($isHome != null) {
        $path = '';
    } else {
        $path = '../';
    }
    echo '<footer id="footer" class="footer-1">
    <div class="main-footer widgets-dark typo-light">
        <div class="container">
            <div class="row">
    
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget subscribe no-box">
                        <h5 class="widget-title">Ouwesh Seeroo<span></span></h5>
                        <p>Middlesex University Mauritius, Studying Computer Science (Systems Engineering) </p>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget no-box">
                        <h5 class="widget-title">Quick Links<span></span></h5>
                        <ul class="thumbnail-widget">
                            <li>
                                <div class="thumb-content"><a href="' . $path . 'help/help.php">Help</a></div>
                            </li>
                            <li>
                                <div class="thumb-content"><a href="' . $path . 'score/score.php">Top Players</a></div>
                            </li>
                            <li>
                                <div class="thumb-content"><a href="' . $path . 'login/login.php">Login</a></div>
                            </li>
                            <li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="widget no-box">
                        <h5 class="widget-title">Sign Up<span></span></h5>
                        <p>Register here to start playing and keep track of your scores</p>
                        <a class="btn btn-nav" href="' . $path . 'register/register.php" target="_blank">Register Now</a>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-md-3">
    
                    <div class="widget no-box">
                        <h5 class="widget-title">Contact Us<span></span></h5>
    
                        <p><a style="color:#0DAB76" href="mailto:info@domain.com" title="glorythemes"><strong>ms2788@live.mdx.ac.uk</strong></a></p>
                        <ul class="social-footer2">
                            <li class="">
                                <a title="youtube" target="_blank" href="https://www.youtube.com/"><img alt="youtube" width="30" height="30" src="' . $path . 'common/img/youtube.png"></a>
                            </li>
                            <li class="">
                                <a href="https://www.facebook.com/" target="_blank" title="Facebook"><img alt="Facebook" width="30" height="30" src="' . $path . 'common/img/facebook.png"></a>
                            </li>
                            <li class="">
                                <a href="https://twitter.com" target="_blank" title="Twitter"><img alt="Twitter" width="30" height="30" src="' . $path . 'common/img/twitter.png"></a>
                            </li>
                            <li class="">
                                <a title="instagram" target="_blank" href="https://www.instagram.com/"><img alt="instagram" width="30" height="30" src="' . $path . 'common/img/instagram.png"></a>
                            </li>
                        </ul>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright Ouwesh Seeroo ©2019. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    </footer>';
    echo '</body>';
}



