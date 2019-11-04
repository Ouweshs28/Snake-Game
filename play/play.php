<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake- Play","play");
outputNavBar("play");
?>

<?php
// Function to generate the footer
// No parameter is needed for generateFooter
generateFooter();
generateCommonJS("play");
?>