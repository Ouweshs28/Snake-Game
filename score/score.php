<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake - Leaderboard","score");
outputNavBar("Score");
?>
<script src="js/score.js" defer>
    window.onload=GenerateTable();
</script>
<!-- TROPHIES -->
<img src="img/trophines.png" class="rounded float-left scoreImg" alt="Rankings">
<!-- High Scores -->
<img src="img/high-score.png" class="rounded float-right scoreImg" alt="High Score">

<!-- LEADERBOARD-->
<div class="text-center m-5 mainHeadText">
    <h1>TOP PLAYERS</h1>
</div>
<!-- Leader Board Table -->
<div id="scoreBoard">
</div>
<?php
// No parameter is needed for generateFooter
generateFooter();
// outputs needed js for score page
generateCommonJS("score");
?>
