//DREW KROEGER- CSC390- PROJECT TWO-
//this is one of three js pages for project two
function buttonClick()
{
    let theNameBox = document.querySelector('#nameBox');
    console.log(theNameBox);

    let theAgeBox = document.querySelector('#ageBox');
    console.log(theAgeBox)

    let theNameBoxTrue = theNameBox.value;
    let theAgeBoxTrue = theAgeBox.value;

    if (theAgeBoxTrue >= 150 || theAgeBoxTrue < 0)
    {
        alert("I do not think that is your real age! >:(. Try Again!");
        theAgeBox.value = '';
        return;
    }

    if (theNameBoxTrue.length === 0){
        alert("Please enter your name!");
        return;
    }

    if (theAgeBoxTrue.length === 0)
    {
        alert("Please enter your age!");
        return;
    }

    alert(`Hello ${theNameBoxTrue}! You are ${theAgeBoxTrue} years old!`);
    theAgeBox.value = '';
    theNameBox.value = '';

}