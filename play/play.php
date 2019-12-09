<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake- Play", "play");
outputNavBar("play");
?>
<script src="js/play.js"></script>
    <header class="wrap">
        <h1>Snake</h1>
        <h5 id="pause">Press P to pause/resume the game</h5>
        <p class="score" style="display: none" >Timer: <span id="timer">starting..</span></p>
        <p class="score">Score: <span id="score_value">0</span></p>
    </header>
    <canvas class="wrap" id="snake" width="800" height="400" tabindex="1"></canvas>

    <!-- Game Over Screen -->
    <div id="gameover">
        <h2>Game Over</h2>
        <p>press <span style="background-color: #FFFFFF; color: #000000">space</span> to begin a new arcade mode</p>
        <p>press <span style="background-color: #FFFFFF; color: #000000">  t  </span> to begin a new arcade mode</p>
        <a id="newgame_gameover">Arcade Mode</a>
        <a id="newgame_time_gameover">Time Attack</a>
        <a id="setting_gameover">Settings</a>
    </div>

    <!-- Setting screen -->
    <div id="setting">
        <h2>Settings</h2>

        <a id="newgame_setting">Arcade Mode</a>
        <a id="newgame_time_setting">Time Attack</a>

        <p>Speed:
            <input id="speed1" type="radio" name="speed" value="120" checked/>
            <label for="speed1">Slow</label>
            <input id="speed2" type="radio" name="speed" value="75"/>
            <label for="speed2">Normal</label>
            <input id="speed3" type="radio" name="speed" value="35"/>
            <label for="speed3">Fast</label>
        </p>

        <p>Wall:
            <input id="wallon" type="radio" name="wall" value="1" checked/>
            <label for="wallon">On</label>
            <input id="walloff" type="radio" name="wall" value="0"/>
            <label for="walloff">Off</label>
        </p>

    </div>

    <!-- Main Menu Screen -->
    <div id="menu">
        <h2>Snake</h2>

        <a id="newgame_menu">Arcade Mode</a>
        <a id="newgame_time_menu">Time Attack</a>
        <a id="setting_menu">Settings</a>
    </div>
<?php
// Function to generate the footer
// No parameter is needed for generateFooter
generateFooter();
generateCommonJS("play");
?>