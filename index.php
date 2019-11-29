<?php
//Include the PHP functions to be used on the page
include('common/common.php');

//Output header and navigation
generateHeader("Snake-Home", "home");
outputNavBar("Home");
?>
    <!-- Carousel -->
    <section>
        <div class="carousel slide" data-ride="carousel" id="carouselGameplayIndicators">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#carouselGameplayIndicators"></li>
                <li data-slide-to="1" data-target="#carouselGameplayIndicators"></li>
                <li data-slide-to="2" data-target="#carouselGameplayIndicators"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img alt="Gameplay image 1" class="d-block w-100" src="img/gameplay1.PNG">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Some temporary screenshots of a snake game</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Gameplay image 2" class="d-block w-100" src="img/gameplay2.png">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Some temporary screenshots of a snake game</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Gameplay image 3" class="d-block w-100" src="img/gameplay3.png">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Some temporary screenshots of a snake game</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" data-slide="prev" href="#carouselGameplayIndicators" role="button">
                <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" data-slide="next" href="#carouselGameplayIndicators" role="button">
                <span aria-hidden="true" class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- About Game Card Box -->
    <section>
        <div class="card mb-3" id="aboutGame">
            <div class="card-body card border-dark mb-3 " id="breifBox">
                <h5 class="card-title">About Our Game</h5>
                <p class="card-text">Play the classic Snake game for free at our website. You can register for free and
                    challenge your friends. We have introduced some new game modes for a more challenging experience.
                    You can keep track of your scores with your friends</p>
            </div>
        </div>
        <!-- Center Play Button -->
        <div id="playButton" class="col text-center">
            <a class="btn col-md-2" id="playBtn" href="play/play.php">Play</a>
        </div>
    </section>

    <!-- Cards section  -->
    <section>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="img/registration-icon.png" alt="Register">
                <div class="card-body">
                    <h5 class="card-title text-center">Registration</h5>
                    <p class="card-text">Sign up to keep track of your best scores and challenge yourself.</p>
                </div>
                <div class="card-footer">
                    <div class="col text-center">
                        <a class="btn cardBtn" href="register/register.php">Register now</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/help-icon.png" alt="Help">
                <div class="card-body">
                    <h5 class="card-title text-center">Help</h5>
                    <p class="card-text">Need help about the game? How to play, controls or information about the
                        game? </p>
                </div>
                <div class="card-footer">
                    <div class="col text-center">
                        <a class="btn cardBtn" href="help/help.php">Find out more</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/ranking.png" alt="Rankings">
                <div class="card-body">
                    <h5 class="card-title text-center">Rankings</h5>
                    <p class="card-text">See your scores and compare them with other players. Beat your friends or your
                        own best</p>
                </div>
                <div class="card-footer">
                    <div class="col text-center">
                        <a class="btn cardBtn" href="score/score.php">View top players</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
// Function to generate the footer
//Takes isHome as an optional parameter as if it is the home directories are different
generateFooter('true');
// Generates JS Libraries used
generateCommonJS("home");
?>