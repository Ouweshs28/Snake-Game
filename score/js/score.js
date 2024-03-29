//New Array to store all user registered in the array
let userArray = [];

// Sorting users according to the scores
userArray = SortScores();
GenerateTable();

// Populating users in localstorage in an array
function PopulateUsers() {
    let existingUsers= JSON.parse(localStorage.getItem("users"));
    userArray= existingUsers;
    return userArray;
}

//Sorting the scores

function SortScores() {
    userArray = PopulateUsers();
    let needsort = true;
    for (let i = 1; i < userArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < userArray.length - 1; j++) {
            if (userArray[j].score < userArray[j + 1].score) {
                let temp = userArray[j + 1];
                userArray[j + 1] = userArray[j];
                userArray[j] = temp;
                needsort = true;
            }

        }
    }
    return userArray;
}

//Generating Tables

function GenerateTable() {
    let table = '<table class="table table-hover table-borderless text-center">' +
        '        <caption id="captionText">List of user rankings</caption>' +
        '        <thead id="tableHead">' +
        '        <tr>' +
        '            <th scope="col">Rank</th>' +
        '            <th scope="col">Name</th>' +
        '            <th scope="col">Username</th>' +
        '            <th scope="col">Scores</th>' +
        '        </tr>' +
        '        </thead>' +
        '        <tbody>';
    document.getElementById('scoreBoard').innerHTML = table;
    if (localStorage.length === 0) {
        document.getElementById("scoreBoard").style.paddingBottom = "120px";
        toastr.error("No User Data Available");
        return
    }
    let rank = 1;
    userArray.forEach(function (item) {
        rank === 1 ? $('tbody').append('<tr class="table-success"><th scope="row">' + rank + '</th>' + '<td>' + item.name + '</td><td>' + item.username + '</td><td>' + item.score + '</td></tr>') :
            $('tbody').append('<tr><th scope="row">' + rank + '</th>' + '<td>' + item.name + '</td><td>' + item.username + '</td><td>' + item.score + '</td></tr>');
        rank++;
    });
}

