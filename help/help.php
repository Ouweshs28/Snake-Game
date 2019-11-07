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
    <div class="text-center m-5 mainHeadText">
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
            <img src="img/Rules.png" class="card-img-top" alt="rules">
            <div class="card-body">
                <ul class="card-text helpText">
                    <ul>
                        <li><strong>(Normal / Expert Mode)</strong></li>
                    </ul>
                    <li>Don't run the snake into the wall, or his own tail: you die</li>
                    <ul>
                        <li><strong>(Easy Mode)</strong></li>
                    </ul>
                    <li>You only die if you it your tail</li>
                    <ul>
                        <li><strong>(Time Attack)</strong></li>
                    </ul>
                    <li>Check the timer, if it is up you are dead</li>
                </ul>
            </div>
        </div>
        <!--GAMES MODES BOX-->
        <div class="card">
            <h5 class="card-title text-center p-4">GAME MODES</h5>
            <img src="img/Levels.png" class="card-img-top" alt="levels">
            <div class="card-body">
                <ul class="card-text helpText">
                    <p><strong>Normal Mode (Easy/ Normal/ Expert)</strong></p>
                    <li>Easy is for new players easy to play with less rules</li>
                    <li>Normal is for people who are used to the game</li>
                    <li>Expert is for the players who want a real challenge</li>
                    <p class="text-center"><strong>Time Attack</strong></p>
                    <li>This creates a new level of challenge with you being play as quick as you can achieve maximum
                        score
                    </li>
                </ul>
            </div>
        </div>
        <!--CONTROLS BOX-->
        <div class="card">
            <h5 class="card-title text-center p-4">CONTROLS</h5>
            <img src="img/Controls.png" class="card-img-top" alt="controls">
            <div class="card-body">
                <ul class="card-text helptext">
                    <li>Use your cursor keys: up, left, right, and down.</li>
                    <li> Keyboard "P" may also be used for "Play" and "Pause"</li>
                    <ul><strong>For left handed use:</strong></ul>
                    <li>W: UP</li>
                    <li>A: LEFT</li>
                    <li>D: RIGHT</li>
                    <li>S: DOWN</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Buttons-->
    <div class="text-center">
        <a class="btn btn-lg helpButton" id="buttonHelpSection"
           href="../register/register.php">Register Now</a>
        <a class="btn btn-lg helpButton" id="playBtnHelp" href="../play/play.php">Play Now</a>

    </div>
</section>
<?php
// No parameter is needed for generateFooter
generateFooter();
// generating JS for help
generateCommonJS("help");
?>
