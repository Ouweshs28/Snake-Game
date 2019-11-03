<?php

//Outputs common header
function generateHeader($pageTitle,$pagecss){
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->';
    echo '<title>' . $pageTitle . '</title>';
    echo '<!-- Bootstrap -->';
    if($pagecss=='home') {
        echo '<link href="common/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Common CSS -->';
        echo '<link href="common/css/common.css" rel="stylesheet" type="text/css">';
        echo '<!-- ' . $pageTitle . 'CSS -->';
        echo '<link href="css/' . $pagecss . '-style.css" rel="stylesheet" type="text/css">';
        echo ' <!-- Snake Fav ICON -->';
        echo '<link rel="shortcut icon" type="image/png" href="common/img/snake_icon.ico"/>';
    }else{
        echo '<link href="../common/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Common CSS -->';
        echo '<link href="../common/css/common.css" rel="stylesheet" type="text/css">';
        echo '<!-- ' . $pageTitle . 'CSS -->';
        echo '<link href="css/' . $pagecss . '-style.css" rel="stylesheet" type="text/css">';
        echo ' <!-- Snake Fav ICON -->';
        echo '<link rel="shortcut icon" type="image/png" href="../common/img/snake_icon.ico"/>';
    }
}

//Closes head

function closeHead(){
    echo '</head>';
    echo '<body>';
}


/* Outputs NavigationBar with corresponding link */
function outputNavBar($pageName){
   //  Common Navigation Part
    echo '<!--Navigation Bar-->';
    echo '<nav class="navbar fixed-top" id="navBar">';
    if($pageName=='Home'){
        echo '<a class="navbar-brand" href="index.php">
        <img alt="snake icon" class="d-inline-block align-top" src="common/img/snake-icon.png"> Snake
    </a>';
    }else{
        echo '<a class="navbar-brand" href="../index.php">
        <img alt="snake icon" class="d-inline-block align-top" src="../common/img/snake-icon.png"> Snake
    </a>';
    }

    echo '<ul class="navbar-nav ml-auto">
        <li class="nav-item">';

    //Array of pages to link to
    $linkNames = array("Home", "Score", "Login");
    $linkFolderHome = array( "","score/", "login/");
    $linkFolder = array("../", "../score/", "../login/");
    $linkFiles = array("index.php", "score.php", "login.php");


    for($x = 0; $x < count($linkNames); $x++){
        echo '<a class="btn navbar-btn navButton" type="button"';
        if($linkNames[$x] == $pageName){
            echo 'id="activeNavBtn"';
        }
        if ($pageName=='Home'){
            if($x==0){
                echo 'href="' . $linkFiles[$x] . '">' . $linkNames[$x] . '</a>';
            }else{

            echo 'href="' . $linkFolderHome[$x] . $linkFiles[$x]. '">' . $linkNames[$x] . '</a>';
            }
        }else{
            echo 'href="' . $linkFolder[$x] . $linkFiles[$x]. '">' . $linkNames[$x] . '</a>';
        }
    }
    echo '</li>
    </ul>
</nav>';
}

function generateCommonJS($pagecss){
    if($pagecss=='home') {
        echo '<!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->';
        echo '<script src="common/js/jquery/jquery.min.js"></script>';
        echo '<!-- Include all compiled plugins (below), or include individual files as needed -->';
        echo '<script src="common/js/bootstrap/bootstrap.min.js"></script>';
    }else{
        echo '<!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->';
        echo '<script src="../common/js/jquery/jquery.min.js"></script>';
        echo '<!-- Include all compiled plugins (below), or include individual files as needed -->';
        echo '<script src="../common/js/bootstrap/bootstrap.min.js"></script>';

    }
    echo '</html>';
}

