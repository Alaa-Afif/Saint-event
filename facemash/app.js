let left = document.getElementById('left');
let right = document.getElementById('right');

let leftNum = 1;
let rightNum = 2;
let list = [0,1,2,3,4,5,6,7,8,9,10,11,12,13]

left.addEventListener('click', function (){
    rightNum = getimage();
    right.setAttribute('src',`images/${rightNum}.jpeg`)
})

right.addEventListener('click', function () {
    leftNum = getimage();
    left.setAttribute('src',`images/${leftNum}.jpeg`)
})


var total = list.length;
var number = 0;

function getimage(){
    //let number = Math.floor(Math.random() * total);
    let number = list[Math.floor(Math.random() * total)];
    list = [list.slice(0,number)]+[list.slice(number+1,total)];

    console.log(list);
    console.log(number);
    
    if (number != leftNum && number != rightNum){
        return number;
    }else if (number == leftNum || number == rightNum){
        return getimage();
    }
}