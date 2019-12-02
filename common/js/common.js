function CheckSession() {
    if (localStorage.username != undefined) {
        document.getElementsByClassName("btn navbar-btn navButton")[2].outerHTML = '<a class="btn navbar-btn navButton" onclick="Logout()">Logout</a>';
    }
    if (window.location.href.includes('login')){
        window.location.href = '/play/play.php';
    }
}

function Logout() {
    localStorage.removeItem('username');
    toastr.success("Successfully logged out");
    setTimeout('Redirect()', 2000);

}

function Redirect() {
    if(!window.location.href.includes('index')){
        toastr.success("Redirecting to home page");
        window.location.href = '../index.php';
    }
}