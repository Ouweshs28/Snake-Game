let email = "";
let username = "";
let password = "";
let confrimpassword = "";

/*
        Function to register user
        1. Validates Input
        2. Checks if there is an existing user with that email or username
        3. Then creates the user
 */

function RegisterUser() {
    if (ValidateInput()) {
        if (CheckExisting() === false) {
            CreateUser();
        }
    }
}


/*
    Function to redirect to login page
 */

function RedirectLogin() {
    window.location.href = '/login/login.php';
    toastr.success("Redirecting to login page");
}

/*
        Validating all fields
        Checking for empty fields and using regular expression
        Prompting errors to the user
 */

function ValidateInput() {
    let valid = false;
    let alphaRegex = /^[a-zA-Z ]+$/;
    let name = document.getElementsByName("name")[0].value;
    if ((name === "") || ((alphaRegex.test(name)) === false)) {
        toastr.error('Please enter a valid name');
        return;
    }
    let usernameRegex = /^[a-zA-Z0-9.\-_$@*!]{3,30}$/;
    username = document.getElementsByName("username")[0].value;
    if ((username === "") || ((usernameRegex.test(username)) === false)) {
        toastr.error('Please enter a valid username ' +
            'A minimum of 3 characters and _$@*! ARE NOT ALLOWED ');
        return;
    }
    if (document.getElementsByName("birthday")[0].value === "") {
        toastr.error('Please enter a valid birth date');
        return;
    }

    if (document.getElementsByTagName("select")[0].value === "Gender") {
        toastr.error('Please select a valid gender');
        return;
    }
    email = document.getElementsByName("email")[0].value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if ((email === "") || ((emailRegex.test(email)) === false)) {
        toastr.error('Please enter a valid email');
        return;
    }
    let phone = document.getElementsByName("phone")[0].value;
    let phoneRegex = /^[+]?[\s./0-9]*[(]?[0-9]{1,4}[)]?[-\s./0-9]*$/g;
    if ((phone === "") || ((phoneRegex.test(phone)) === false)) {
        toastr.error('Please enter a valid phone number');
        return;
    }
    password = document.getElementsByName("password")[0].value;
    if (password === "") {
        toastr.error('Please enter a valid password');
        return;
    }
    confrimpassword = document.getElementsByName("confirmpassword")[0].value;
    if (confrimpassword === "") {
        toastr.error('Please enter a valid confirmed password');
        return;
    }


    valid = true;

    return valid;

}

/*
    Function for passwords:
    1. Validates strong passwords
    2. Checks if both passwords match

 */

function PasswordCheck() {
    confrimpassword = document.getElementsByName("confirmpassword")[0].value;
    password = document.getElementsByName("password")[0].value;

    let passwordRegex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

    if (!password.match(passwordRegex)) {
        document.getElementById('weakPass').style.display = 'block';
        document.getElementById('weakPass').innerHTML = '<div class="alert alert-warning" role="alert">\n' +
            '  <h4 class="alert-heading">Weak password</h4>' +
            '  <p>Please include the following:</p>' +
            '<ul>' +
            '<li>At least 8 characters</li>' +
            '<li> Include a lowercase and uppercase</li>' +
            '<li>At least a number or a special character</li>' +
            '</ul>' +
            '</div>'
    } else {
        document.getElementById('weakPass').style.display = 'none';

    }

    if (password != confrimpassword) {
        document.getElementById('wrongPass').style.display = 'block';
        document.getElementById('wrongPass').innerHTML = '<div class="alert alert-danger" role="alert">' +
            'Confirmed Password & Password do not match' +
            '</div>'
    } else {
        document.getElementById('wrongPass').style.display = 'none';

    }

}
/*
    Checks if the user registered existing email or user
 */
function CheckExisting() {
    let exist = true;
    let existingUsers= JSON.parse(localStorage.getItem("users"));

    for (let i = 0; i < existingUsers.length; i++) {
            username = document.getElementsByName("username")[0].value;
            if (username === existingUsers[i].username) {
                toastr.error(username + " already exists please sign in or choose a different one");
                return;
            }
            email = document.getElementsByName("email")[0].value;
            if (email === existingUsers[i].email) {
                toastr.error(email + " is already taken up, please sign in or choose a different one");
                return;
            }
    }
    exist = false;
    return exist;
}

/*
        Create User function and stores it in an object in local storage
 */


function CreateUser() {
    let users = {};
    users.name = document.getElementsByName("name")[0].value;
    users.username = document.getElementsByName("username")[0].value;
    users.dob = document.getElementsByName("birthday")[0].value;
    users.gender = document.getElementsByTagName("select")[0].value;
    users.email = document.getElementsByName("email")[0].value;
    users.phone = document.getElementsByName("phone")[0].value;
    users.password = document.getElementsByName("password")[0].value;
    users.score = 0;

    //get existing users
    let existingUsers= JSON.parse(localStorage.getItem("users"));
    //add new user to existing
    existingUsers.push(users)

    //Store user
    localStorage["users"] = JSON.stringify(users);
    //Inform user of result
    toastr.success('User registered successfully');
    setTimeout('RedirectLogin()', 2000);

}
