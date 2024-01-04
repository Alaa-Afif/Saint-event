let left = document.getElementById('left');
let right = document.getElementById('right');

var total = list.length;
var number = 0;

let leftNum = 1;
let rightNum = 2;
var list = [1,2,3,4,5,6,7,8,9,10,11,12,13];

function getnumber(){
    //let number = Math.floor(Math.random() * total);
    var number = list[Math.floor(Math.random() * total)];
    
    if (number != leftNum && number != rightNum){
        return number;
    }else if (number == leftNum || number == rightNum){
        return getnumber();
    }
}

left.addEventListener('click', function (){
    rightNum = getnumber();
    right.setAttribute('src',`images/${rightNum}.jpeg`)
    leftNum = getnumber();
    left.setAttribute('src',`images/${leftNum}.jpeg`)
})

right.addEventListener('click', function () {
    rightNum = getnumber();
    right.setAttribute('src',`images/${rightNum}.jpeg`)
    leftNum = getnumber();
    left.setAttribute('src',`images/${leftNum}.jpeg`)
})
