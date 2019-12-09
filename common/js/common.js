function CheckSession() {
    let signedIn=false
    if (localStorage.email != undefined) {
        signedIn=true;
        document.getElementsByClassName("btn navbar-btn navButton")[2].outerHTML = '<a class="btn navbar-btn navButton" onclick="Logout()">Logout</a>';
    }
    if (window.location.href.includes('login') && signedIn==true){
        window.location.href = '/play/play.php';
    }
    if (window.location.href.includes('play') && signedIn==false){
        setTimeout(toastr.error("You need to login to play"), 4000)
        window.location.href = '/login/login.php';
    }
}

function Logout() {
    localStorage.removeItem('email');
    toastr.success("Successfully logged out");
    setTimeout('Redirect()', 2000);

}

function Redirect() {
    if(!window.location.href.includes('index')){
        toastr.success("Redirecting to home page");
        window.location.href = '../index.php';
    }
    if(window.location.href.includes('index')){
        location.reload();
    }
}