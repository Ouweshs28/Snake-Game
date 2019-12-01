function ValidateLogin() {
    let valid=false;
    let email = document.getElementById("loginEmail").value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if ((email === "") || ((emailRegex.test(email)) === false)) {
        toastr.error('Please enter a valid email');
        return;
    }

    let password = document.getElementById("loginPass").value;
    password === "" ? toastr.error('Please enter a password') : valid=true;

    return valid;
}