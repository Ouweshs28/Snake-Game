<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake-Help", "help");
//Outputs Navbar for page name with correct folder structure
outputNavBar("Help");
?>
<section>
    <!-- Help text-->
    <div class="text-center m-5">
        <h1>HELP SECTION</h1>
    </div>
</section>
<!-- Section -->
<section>
    <!--Help Section-->
    <div class="card-deck" id="cardHelp">
        <!--RULES BOX-->
        <div class="card">
            <h5 class="card-title text-center p-4 font-weight-bolder">RULES</h5>
            <img src="img/Rules.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text helpText">This is a longer card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <!--GAMES MODES BOX-->
        <div class="card">
            <h5 class="card-title text-center p-4">GAME MODES</h5>
            <img src="img/Levels.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text helpText">This card has supporting text below as a natural lead-in to additional
                    content.</p>
            </div>
        </div>
        <!--CONTROLS BOX-->
        <div class="card">
            <h5 class="card-title text-center p-4">CONTROLS</h5>
            <img src="img/Controls.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text helptext">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This card has even longer content than the first to show that equal height
                    action.</p>
            </div>
        </div>
    </div>
    <!-- Buttons-->
    <div class="text-center">
        <a type="button" class="btn btn-primary btn-lg helpButton" id="buttonHelpSection"
           href="../register/register.php">Register Now</a>
        <a type="button" class="btn btn-secondary btn-lg helpButton" href="../play/play.php\">Play Now</a>

    </div>
</section>
<?php
// No parameter is needed for generateFooter
generateFooter();
// generating JS for help
generateCommonJS("help");
?>
