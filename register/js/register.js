function RegisterUser() {
    let valid = ValidateInput();
    if (valid == true) {
        CreateUser();
    }
}

function ValidateInput() {
    let valid = false;
    let alphaRegex = /^[a-zA-Z ]+$/;
    let name = document.getElementsByName("name")[0].value;
    if ((name === "") || ((alphaRegex.test(name)) === false)) {
        toastr.error('Please enter a valid name');
        return;
    }
    let usernameRegex = /^[a-zA-Z0-9.\-_$@*!]{3,30}$/;
    let username = document.getElementsByName("username")[0].value;
    if ((username === "") || ((usernameRegex.test(username)) === false)) {
        toastr.error('Please enter a valid username' +
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
    let email = document.getElementsByName("email")[0].value;
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
    let password = document.getElementsByName("password")[0].value;
    if (password === "") {
        toastr.error('Please enter a valid password');
        return;
    }
    let confrimpassword = document.getElementsByName("confirmpassword")[0].value;
    if (confrimpassword === "") {
        toastr.error('Please enter a valid confirmed password');
        return;
    }


    valid = true;

    return valid;

}

function PasswordCheck() {
    let confrimpassword = document.getElementsByName("confirmpassword")[0].value;
    let password = document.getElementsByName("password")[0].value;

    if (password!=confrimpassword) {
        document.getElementById('wrongPass').style.display='block';
        document.getElementById('wrongPass').innerHTML = '<div class="alert alert-danger" role="alert">' +
            'Confirmed Password & Password do not match' +
            '</div>'
    }
    else {
        document.getElementById('wrongPass').style.display='none';

    }

}


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

    //Store user
    localStorage[users.email] = JSON.stringify(users);
    //Inform user of result
    toastr.success('User registered successfully please login')

}
