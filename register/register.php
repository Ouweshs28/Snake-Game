<?php
//Include the PHP functions to be used on the page
include('../common/common.php');

//Output header and navigation
generateHeader("Snake- Register","register");
outputNavBar("Register");
?>

<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Registration Info</h2>
                <form method="POST">
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Username" name="username">
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
                        <input class="input--style-3" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Phone" name="phone">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Confirm Password" name="confirmpassword">
                    </div>
                    <div class="p-t-10">
                        <button class="btn-register btn--pill btn--green" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// No parameter is needed for generateFooter
generateFooter();
generateCommonJS("register");
?>
