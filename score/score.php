<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake - Leaderboard","score");
outputNavBar("Score");
?>

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
    <table class="table table-hover table-borderless text-center">
        <caption id="captionText">List of user rankings</caption>
        <thead id="tableHead">
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Scores</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-success">
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>230</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>200</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>100</td>
        </tr>
        </tbody>
    </table>
</div>
<?php
// No parameter is needed for generateFooter
generateFooter();
// outputs needed js for score page
generateCommonJS("score");
?>
