//DREW KROEGER- CSC390- PROJECT TWO-
//this is one of three js pages for project two
window.addEventListener('load', loadPage);

let intervalId;

function loadPage()
{
    let randomButton = document.querySelector('#randomButton');
    randomButton.addEventListener('mouseover',randomButtonPosition);
    intervalId = setInterval(randomColor, 16);
}

function randomButtonPosition()
{
    console.log("Mouse has overed the button");
    let newXCoordinate = Math.random()*(window.innerWidth-150);
    console.log(newXCoordinate);
    let newYCoordinate = Math.random()*(window.innerHeight-150);
    console.log(newYCoordinate);
    randomButton.style.left = newXCoordinate + "px";
    randomButton.style.top = newYCoordinate + "px";

}

function randomColor()
{
    let red = Math.random()*255;
    let blue = Math.random()*255;
    let green = Math.random()*255;
    document.body.style.backgroundColor = "rgb"+"(" +red+","+blue+ ","+ green+ ")" ;
}