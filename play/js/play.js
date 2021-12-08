(function () {

    /*
    Checks if user is signed in
     */
    /*
     */
    let signedIn = false;
    if (localStorage.email != undefined) {
        signedIn = true;
        document.getElementsByClassName("btn navbar-btn navButton")[2].outerHTML = '<a class="btn navbar-btn navButton" onclick="Logout()">Logout</a>';
    }
    if (window.location.href.includes('play') && !signedIn) {
        toastr.error("You need to login to play");
        window.location.href = '/login/login.php';

    }

    //Disable Scrolling on the page
    window.addEventListener("keydown", function (e) {
        // space and arrow keys
        if ([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
            e.preventDefault();
        }
    }, false);
    /////////////////////////////////////////////////////////////

    // Canvas & Context
    let canvas;

    let ctx;

    // Snake
    let snake;
    let snake_dir;
    let snake_next_dir;
    let snake_speed;

    // Food
    let food = {x: 0, y: 0};
    let foodeaten;

    // Score
    let score;

    // Timer
    let countdown;

    // Wall
    let wall;

    // HTML Elements
    let screen_snake;
    let screen_menu;
    let screen_setting;
    let screen_gameover;
    let button_newgame_menu;
    let button_newgame_time_menu;
    let button_newgame_setting;
    let button_newgame_time_setting;
    let button_newgame_gameover;
    let button_newgame_time_gameover;
    let button_setting_menu;
    let button_setting_gameover;
    let timerelm;
    let timeattack;
    let ele_score;
    let speed_setting;
    let wall_setting;
    let paused;
    let pause;
    let checkdead;
    let level;
    let levelelm;
    let leveldisplay;

    //Sounds

    let dead;
    let eat;
    let bump;


    /////////////////////////////////////////////////////////////

    //Random Color Generator
    function getRandomColor() {
        let letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function getRandomRed() {
        let letters = '0123456789ABCDEF';
        let color = '#FF';
        for (let i = 0; i < 4; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
    let activeDot = function (x, y) {
        ctx.fillStyle = getRandomColor();
        ctx.fillRect(x * 10, y * 10, 10, 10);
    };


    /////////////////////////////////////////////////////////////
/*
        Changing direction of Snake according to keyboard press
        Passing keyboard key event as parameter
 */
    let changeDir = function (key) {

        if (key == 38 || key == 87 && snake_dir != 2) {
            snake_next_dir = 0;
        } else {

            if (key == 39 || key == 68 && snake_dir != 3) {
                snake_next_dir = 1;
            } else {

                if (key == 40 || key == 83 && snake_dir != 0) {
                    snake_next_dir = 2;
                } else {

                    if (key == 37 || key == 65 && snake_dir != 1) {
                        snake_next_dir = 3;
                    }
                }
            }
        }
        if (key==80){
            pauseGame();
        }

    };

    /////////////////////////////////////////////////////////////
        /*
        Generating food base on canvas size
         */
    let addFood = function () {
        food.x = Math.floor(Math.random() * ((canvas.width / 10) - 1));
        food.y = Math.floor(Math.random() * ((canvas.height / 10) - 1));
        for (let i = 0; i < snake.length; i++) {
            if (checkBlock(food.x, food.y, snake[i].x, snake[i].y)) {

                addFood();
            }
        }
    };

    // Checks blocks each time
    /////////////////////////////////////////////////////////////

    let checkBlock = function (x, y, _x, _y) {
        return (x == _x && y == _y) ? true : false;
    };

    /////////////////////////////////////////////////////////////
    // Updates scores accordingly
    let altScore = function (score_val) {
        ele_score.innerHTML = String(score_val);
    };

    /////////////////////////////////////////////////////////////
    // Main Loop of the game
    // Handles with the snake moving
    let mainLoop = function () {
        console.log(snake_speed)
        levelelm.innerHTML = leveldisplay;
        if(paused){
            return;
        }
        if(score>5 && leveldisplay==1){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=2;
        }
        if(score>10 && leveldisplay==2){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=3;
        }
        if(score>15 && leveldisplay==3){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=4;
        }
        if(score>20 && leveldisplay==4){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=5;
        }
        if(score>25 && leveldisplay==5){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=6;
        }
        if(score>30 && leveldisplay==6){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=7;
        }
        if(score>35 && leveldisplay==7){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=8;
        }
        if(score>40 && leveldisplay==8){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=9;
        }
        if(score>45 && leveldisplay==9){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=10;
        }
        if(score>50 && leveldisplay==10){
            setSnakeSpeed(snake_speed-20);
            leveldisplay=11;
        }


        let _x = snake[0].x;
        let _y = snake[0].y;
        snake_dir = snake_next_dir;

        // 0 - Up, 1 - Right, 2 - Down, 3 - Left
        switch (snake_dir) {
            case 0:
                _y--;
                break;
            case 1:
                _x++;
                break;
            case 2:
                _y++;
                break;
            case 3:
                _x--;
                break;
        }

        snake.pop();
        snake.unshift({x: _x, y: _y});


        // --------------------

        // Wall

        if (wall == 1) {
            // On
            if (snake[0].x < 0 || snake[0].x == canvas.width / 10 || snake[0].y < 0 || snake[0].y == canvas.height / 10) {
                showScreen(3);
                bump.play();
                return;
            }
        } else {
            // Off
            // If OFF position is the last from the canvas it starts from the first position based on x, y coordinates
            for (let i = 0, x = snake.length; i < x; i++) {
                if (snake[i].x < 0) {
                    snake[i].x = snake[i].x + (canvas.width / 10);
                }
                if (snake[i].x == canvas.width / 10) {
                    snake[i].x = snake[i].x - (canvas.width / 10);
                }
                if (snake[i].y < 0) {
                    snake[i].y = snake[i].y + (canvas.height / 10);
                }
                if (snake[i].y == canvas.height / 10) {
                    snake[i].y = snake[i].y - (canvas.height / 10);
                }
            }
        }

        // --------------------

        // Autophagy death
        for (let i = 1; i < snake.length; i++) {
            if (snake[0].x == snake[i].x && snake[0].y == snake[i].y) {
                storeScore(score);
                dead.play();
                checkdead=true;
                showScreen(3);
                return;
            }
        }

        // --------------------

        // Eat Food
        if (checkBlock(snake[0].x, snake[0].y, food.x, food.y)) {
            snake[snake.length] = {x: snake[0].x, y: snake[0].y};
            score += 1;
            countdown = countdown + 15;
            altScore(score);
            addFood();
            activeDot(food.x, food.y);
            foodeaten=true;
            eat.play();
        }


        // --------------------

        ctx.beginPath();
        ctx.fillStyle = "#000000";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // --------------------

        for (let i = 0; i < snake.length; i++) {
            activeDot(snake[i].x, snake[i].y);
        }

        // --------------------

        activeDot(food.x, food.y);

        setTimeout(mainLoop, snake_speed);
    };
    ////////////////////////////////////////////////////////////
    /* Timer function
        Duration must be in seconds
        For i.e = 2 mins = 60 *2
        Display is the element of the html
     */

    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;

        let start=setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            if (foodeaten){
                foodeaten=false;
                timer=seconds=seconds+10;
            }

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;
            if (--timer < 0 ||checkdead) {
                storeScore(score);
                showScreen(3);
                timeattack = 0;
                clearInterval(start);
                display.textContent="starting..";
                dead.play();
            }
        }, 1000);

    }

    //Initial timer function

    function drawElapsedTime() {
        countdown = 30;
        let display = document.querySelector('#timer');
        if (timeattack != 0) {
            startTimer(countdown, display)
        }
    }
    // Pause Game

    function pauseGame() {
        paused = !paused; // toggle the gamePaused value (false <-> true)
        if (!paused)
            mainLoop(); // restart loop
    }

    //Store scores
    function storeScore(score) {
        let userkey = localStorage.email;
        let userslocal = localStorage.getItem(userkey);
        let users=JSON.parse(userslocal);
        if(score>users.score) {
            toastr.success("Congratulations you have a new high score");
            users.score = score;
            localStorage.removeItem(userkey);
            localStorage[users.email] = JSON.stringify(users);
        }

    }



    /////////////////////////////////////////////////////////////
   // Starts new game
    // Parameter takes time attack on=1 off=0
    let newGame = function (t) {
        eat=new Audio('sound/coin.mp3');
        dead=new Audio('sound/dead.wav');
        bump=new Audio('sound/bump.mp3');
        checkdead=false;
        timeattack = t;
        leveldisplay=1;


        if (timeattack == 1) {
            timerelm.style.display = "block";
            pause.style.display="none";
            drawElapsedTime();
        } else if (timeattack == 0) {
            timerelm.style.display = "none";
            pause.style.display="block";
        }


        showScreen(0);
        screen_snake.focus();

        snake = [];
        for (let i = 4; i >= 0; i--) {
            snake.push({x: i, y: 15});
        }

        snake_next_dir = 1;

        score = 0;
        altScore(score);

        addFood();

        canvas.onkeydown = function (evt) {
            evt = evt || window.event;
            changeDir(evt.keyCode);
        };

        mainLoop();

    };

    /////////////////////////////////////////////////////////////

    // Change the snake speed...
    // 150 = slow
    // 100 = normal
    // 50 = fast
    let setSnakeSpeed = function (speed_value) {
        snake_speed = speed_value;
    };

    /////////////////////////////////////////////////////////////
    let setWall = function (wall_value) {
        wall = wall_value;
        if (wall == 0) {
            screen_snake.style.borderColor = "#606060";
        }
        if (wall == 1) {
            screen_snake.style.borderColor = getRandomRed();
        }
    };

    /////////////////////////////////////////////////////////////
    // Updating HTML elements accordingly
    // 0 for the game
    // 1 for the main menu
    // 2 for the settings screen
    // 3 for the game over screen
    let showScreen = function (screen_opt) {
        switch (screen_opt) {

            case 0:
                screen_snake.style.display = "block";
                screen_menu.style.display = "none";
                screen_setting.style.display = "none";
                screen_gameover.style.display = "none";
                level.style.display="block";
                break;

            case 1:
                screen_snake.style.display = "none";
                screen_menu.style.display = "block";
                screen_setting.style.display = "none";
                screen_gameover.style.display = "none";
                timerelm.style.display = "none";
                level.style.display="none";
                break;

            case 2:
                screen_snake.style.display = "none";
                screen_menu.style.display = "none";
                screen_setting.style.display = "block";
                screen_gameover.style.display = "none";
                timerelm.style.display = "none";
                pause.style.display="none";
                level.style.display="none";
                break;

            case 3:
                screen_snake.style.display = "none";
                screen_menu.style.display = "none";
                screen_setting.style.display = "none";
                screen_gameover.style.display = "block";
                timerelm.style.display = "none";
                pause.style.display="none";
                level.style.display="none";
                break;
        }
    };

    /////////////////////////////////////////////////////////////

    window.onload = function () {

        canvas = document.getElementById("snake");
        ctx = canvas.getContext("2d");

        // Screens
        screen_snake = document.getElementById("snake");
        screen_menu = document.getElementById("menu");
        screen_gameover = document.getElementById("gameover");
        screen_setting = document.getElementById("setting");

        // Buttons
        button_newgame_menu = document.getElementById("newgame_menu");
        button_newgame_time_menu = document.getElementById("newgame_time_menu");
        button_newgame_setting = document.getElementById("newgame_setting");
        button_newgame_time_setting = document.getElementById("newgame_time_setting");
        button_newgame_gameover = document.getElementById("newgame_gameover");
        button_newgame_time_gameover = document.getElementById("newgame_time_gameover");
        button_setting_menu = document.getElementById("setting_menu");
        button_setting_gameover = document.getElementById("setting_gameover");

        // etc
        ele_score = document.getElementById("score_value");
        levelelm=document.getElementById("level");
        speed_setting = document.getElementsByName("speed");
        wall_setting = document.getElementsByName("wall");
        timerelm = document.getElementsByClassName("score")[0];
        level=document.getElementsByClassName("score")[2];
        pause=document.getElementById("pause");


        // --------------------

        button_newgame_menu.onclick = function () {
            newGame(0);
        };
        button_newgame_time_menu.onclick = function () {
            newGame(1)
        };
        button_newgame_gameover.onclick = function () {
            newGame(0);
        };
        button_newgame_time_gameover.onclick = function () {
            newGame(1);
        };
        button_newgame_setting.onclick = function () {
            newGame(0);
        };
        button_newgame_time_setting.onclick = function () {
            newGame(1);
        };
        button_setting_menu.onclick = function () {
            showScreen(2);
        };
        button_setting_gameover.onclick = function () {
            showScreen(2)
        };

        setSnakeSpeed(150);
        setWall(1);

        showScreen("menu");

        // --------------------
        // Settings

        // speed
        for (let i = 0; i < speed_setting.length; i++) {
            speed_setting[i].addEventListener("click", function () {
                for (let i = 0; i < speed_setting.length; i++) {
                    if (speed_setting[i].checked) {
                        setSnakeSpeed(speed_setting[i].value);
                    }
                }
            });
        }

        // wall
        for (let i = 0; i < wall_setting.length; i++) {
            wall_setting[i].addEventListener("click", function () {
                for (let i = 0; i < wall_setting.length; i++) {
                    if (wall_setting[i].checked) {
                        setWall(wall_setting[i].value);
                    }
                }
            });
        }

        document.onkeydown = function (evt) {
            if (screen_gameover.style.display == "block") {
                evt = evt || window.event;
                if (evt.keyCode == 32) {
                    newGame(0);
                }
                if (evt.keyCode == 84) {
                    newGame(1);
                }
            }
        };

    };

})();
