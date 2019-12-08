let userArray = new Array();
userArray=SortScores();
GenerateTable();
function PopulateUsers() {
    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i);
        if (key !=="email") {
            let userkey = localStorage.getItem(key);
            userArray[i] = JSON.parse(userkey);//Convert to object

        }
    }
    return userArray;
}

function SortScores() {
    userArray=PopulateUsers();
    let needsort=true;
    for (let i=1;i<userArray.length && needsort;i++){
        needsort=false;
        for (let j=0;j<userArray.length-1;j++){
            if(userArray[j].score<userArray[j+1].score){
                let temp=userArray[j+1];
                userArray[j+1]=userArray[j];
                userArray[j]=temp;
                needsort=true;
            }

        }
    }
    return userArray;
}

function GenerateTable() {
    let table='<table class="table table-hover table-borderless text-center">' +
        '        <caption id="captionText">List of user rankings</caption>' +
        '        <thead id="tableHead">' +
        '        <tr>' +
        '            <th scope="col">Rank</th>' +
        '            <th scope="col">Name</th>' +
        '            <th scope="col">Username</th>' +
        '            <th scope="col">Scores</th>' +
        '        </tr>' +
        '        </thead>'+
        '        <tbody>';
    document.getElementById('scoreBoard').innerHTML=table;
    if(localStorage.length===0){
        document.getElementById("scoreBoard").style.paddingBottom="120px";
        toastr.error("No User Data Available");
        return
    }
    let rank=1;
    userArray.forEach(function(item){
        rank===1 ? $('tbody').append('<tr class="table-success"><th scope="row">'+rank+'</th>'+'<td>'+item.name+'</td><td>'+item.username+'</td><td>'+item.score+'</td></tr>'):
        $('tbody').append('<tr><th scope="row">'+rank+'</th>'+'<td>'+item.name+'</td><td>'+item.username+'</td><td>'+item.score+'</td></tr>')
        rank++;
    });
}

