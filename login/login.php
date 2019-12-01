<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake-Sign In", "login");
//Outputs Navbar for page name with correct folder structure
outputNavBar("Login");
?>
<script src="js/login.js"></script>
<!-- Login Page Contents-->
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="img/Login.png" alt="IMG">
            </div>

            <div class="login100-form validate-form">
					<span class="login100-form-title">
						Member Login
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" id="loginEmail" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="pass" id="loginPass" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" onclick="return ValidateLogin();">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-25">
                    <a class="txt2" href="../register/register.php">
                        Create your Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// No parameter is needed for generateFooter
generateFooter();
// generates the libraries for the login page
generateCommonJS("login");
?>
