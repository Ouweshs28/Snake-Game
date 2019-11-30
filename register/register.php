<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake- Register","register");
outputNavBar("Register");
?>
<script src="js/register.js"></script>
<section>
<div class="page-wrapper bg-gra-01 p-t-100 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading"></div>
            <!--TITLE -->
            <div class="card-body">
                <h2 class="title">Registration Info</h2>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Name" name="name" >
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Username" name="username" >
                    </div>
                    <div class="input-group">
                        <input class="input--style-3 js-datepicker" type="text" placeholder="Birth Date" name="birthday">
                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="gender">
                                <option disabled="disabled" selected="selected">Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="email" placeholder="Email" name="email" >
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Phone" name="phone" >
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" oninput="return PasswordCheck()" placeholder="Password" name="password" >
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" oninput="return PasswordCheck()" placeholder="Confirm Password" name="confirmpassword" >
                    </div>
                <div id="wrongPass"></div>
                    <!--Button-->
                    <div class="p-t-10">
                        <button class="btn-register btn--pill btn--green" onclick="return RegisterUser();">Submit</button>
                    </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php
// No parameter is needed for generateFooter
generateFooter();
// Outputs Libraries needed for register page
generateCommonJS("register");
?>
