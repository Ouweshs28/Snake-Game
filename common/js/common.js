/*
    Checks session on each page
    If user is logged in change button to logout
    If the user tries to access login page they are redirected to play page
 */
function CheckSession() {
    let signedIn = false;
    if (localStorage.email != undefined) {
        signedIn = true;
        document.getElementsByClassName("btn navbar-btn navButton")[2].outerHTML = '<a class="btn navbar-btn navButton" onclick="Logout()">Logout</a>';
    }
    if (window.location.href.includes('login') && signedIn == true) {
        window.location.href = '/play/play.php';
    }
    if (window.location.href.includes('play') && signedIn == false) {
        setTimeout(toastr.error("You need to login to play"), 4000);
        window.location.href = '/login/login.php';
    }
}

function Logout() {
    localStorage.removeItem('email');
    toastr.success("Successfully logged out");
    setTimeout('Redirect()', 2000);

}

/*
    Redirects to respective pages
    If its not the home it will redirect to home
    else it will reload the home page
 */

function Redirect() {
    if (!window.location.href.includes('index')) {
        toastr.success("Redirecting to home page");
        window.location.href = '../index.php';
    }
    if (window.location.href.includes('index')) {
        location.reload();
    }
}