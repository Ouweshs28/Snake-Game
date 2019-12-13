let email = "";
let password = "";

/*
    Function to login
    Validates Login
    If its valid then if check the data with local storage
 */
function UserLogin() {
    let valid = ValidateLogin();
    if (valid === true) {
        CheckUser();
    }

}

/*
     Function to redirect to play page after login
 */

function RedirectPlay() {
    window.location.href = '/play/play.php';
    toastr.success("Redirecting to game page");
}

/*
    Checks for the following:
    If user already created an account
    if not prompt the user
 */
function CheckUser() {
    email = document.getElementById("loginEmail").value;
    password = document.getElementById("loginPass").value;
    if (localStorage[email] === undefined) {
        //Inform user that they do not have an account
        toastr.warning("You do not have an account please create one");
        return; //Do nothing else
    } else {//User has an account
        let users = JSON.parse(localStorage[email]);//Convert to object
        if (password === users.password) {//Successful login
            toastr.success(users.username + " successfully logged in");
            localStorage.email = users.email;//Store name
            setTimeout('RedirectPlay()', 3000);
        } else {
            toastr.error("Wrong user password, please try again!")
        }
    }
}


/*
    Regex Validation
 */

function ValidateLogin() {
    let valid = false;
    email = document.getElementById("loginEmail").value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if ((email === "") || ((emailRegex.test(email)) === false)) {
        toastr.error('Please enter a valid email');
        return;
    }

    password = document.getElementById("loginPass").value;
    password === "" ? toastr.error('Please enter a password') : valid = true;

    return valid;
}