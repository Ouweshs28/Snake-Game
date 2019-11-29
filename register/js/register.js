function ValidateUser() {
    let valid=false;
    //Build object that we are going to store
    if (document.getElementsByName("name")[0].value ==="") {
        toastr.error('Please enter a valid name');
        return;
    }

    if (document.getElementsByName("username")[0].value ==="") {
        toastr.error('Please enter a valid username');
        return;
    }
    if (document.getElementsByName("birthday")[0].value ==="") {
        toastr.error('Please enter a valid birth date');
        return;
    }

    if (document.getElementsByTagName("select")[0].value==="Gender"){
        toastr.error('Please select a valid gender');
        return;
    }

    if (document.getElementsByName("email")[0].value ==="") {
        toastr.error('Please enter a valid email');
        return;
    }

    if (document.getElementsByName("phone")[0].value ==="") {
        toastr.error('Please enter a valid email');
        return;
    }

    if (document.getElementsByName("password")[0].value ==="") {
        toastr.error('Please enter a valid password');
        return;
    }
    if (document.getElementsByName("confirmpassword")[0].value ==="") {
            toastr.error('Please enter a valid confrimed password');
            return;
        }

}

/*
function RegisterUser(){
    let users=[];
    users.name = document.getElementsByName("name")[0].value;
    users.username = document.getElementsByName("username")[0].value;
    users.dob = document.getElementsByName("birthday")[0].value;
    users.gender = document.getElementsByTagName("select")[0].value;
    users.email = document.getElementsByName("email")[0].value;
    users.phone = document.getElementsByName("phone")[0].value;
    users.password = document.getElementsByName("password")[0].value;



        //Store user
        localStorage[users.email] = JSON.stringify(users);
        console.log(users);
        //Inform user of result
        alert("working")


}*/
