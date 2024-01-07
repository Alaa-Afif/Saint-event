var userList = [
    { id: 1, name: "Mahdi Mhadhbi", instagramId: "mahdi", image: "images/1.jpeg", score:0 },
    { id: 2, name: "Alaa Afif", instagramId: "_Alaa_Afif_", image: "images/2.jpeg", score:0 },
    { id: 3, name: "rami gharssali", instagramId: "rami_gharsali", image: "images/0.jpeg", score:0 },
    { id: 4, name: "ghassen dalhoumi", instagramId: "Ghassen_dhaloumi", image: "images/3.jpeg", score:0 },
    { id: 5, name: "amine aloui", instagramId: "Amine_aloui", image: "images/4.jpeg", score:0 },
    { id: 6, name: "aymen nefzi", instagramId: "Aymen_nefzi", image: "images/5.jpeg" , score:0},
    { id: 7, name: "youssef elech", instagramId: "Youssef_elech", image: "images/6.jpeg", score:0 },
    { id: 8, name: "samir gehri", instagramId: "samir_gehri", image: "images/7.jpeg", score:0 },
];

var total = userList.length;

let leftUser, rightUser, leftScore = 0, rightScore = 0;

updateUsers();

function getRandomUser() {
    var user = userList[Math.floor(Math.random() * total)];
    if (user !== leftUser && user !== rightUser) {
        return user;
    } else {
        return getRandomUser();
    }
}

function updateUsers() {
    leftUser = getRandomUser();
    rightUser = getRandomUser();
    document.getElementById('left-choice').textContent = `Choice number ${leftUser.id}`;
    document.getElementById('left-name').textContent = leftUser.name;
    document.getElementById('left-instagram').textContent = `Instagram ID: ${leftUser.instagramId}`;
    document.getElementById('left').setAttribute('src', leftUser.image);
    document.getElementById('score-left').textContent = leftScore;
    document.getElementById('right-choice').textContent = `Choice number ${rightUser.id}`;
    document.getElementById('right-name').textContent = rightUser.name;
    document.getElementById('right-instagram').textContent = `Instagram ID: ${rightUser.instagramId}`;
    document.getElementById('right').setAttribute('src', rightUser.image);
    document.getElementById('score-right').textContent = rightScore;
}

function updateScore(_userid) {
    for(let i = 0; i < userList.length; i++){
        if (userList[i].id === _userid - 1) {
            userList[i].score++;
            break;
        }
    }
    
    
    /*if (winner === 'left') {
        leftScore++;
    } else if (winner === 'right') {
        rightScore++;
    }
    document.getElementById('score-left').textContent = leftScore;
    document.getElementById('score-right').textContent = rightScore;*/

    updateUsers();
}

document.getElementById('left').addEventListener('click', function () {
    updateScore(userList[leftUser]);
});

document.getElementById('right').addEventListener('click', function () {
    updateScore(userList[rightUser]);
});
