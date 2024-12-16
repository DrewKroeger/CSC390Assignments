//DREW KROEGER- CSC390- PROJECT TWO-
//this is one of three js pages for project two
function addition()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');
    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length === 0)
    {
        alert("Please fill out both boxes before proceeding!")
        return;
    }
    console.log(firstBoxValue);
    console.log(secondBoxValue);

    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let secondBoxInt = parseFloat(secondBoxValue);
    let sum = firstBoxInt + secondBoxInt;
    console.log(sum);
    resultBox.textContent = 'The result is: ' + sum; 

    addToList(firstBoxInt, secondBoxInt , "+", sum);
}

function subtraction()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');
    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length === 0)
    {
        alert("Please fill out both boxes before proceeding!")
        return;
    }
    console.log(firstBoxValue);
    console.log(secondBoxValue);

    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let secondBoxInt = parseFloat(secondBoxValue);
    let difference = firstBoxInt - secondBoxInt;
    console.log(difference);
    resultBox.textContent = 'The result is: ' + difference; 

    addToList(firstBoxInt, secondBoxInt , "-", difference);
}

function multiplication()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');
    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length === 0)
    {
        alert("Please fill out both boxes before proceeding!")
        return;
    }
    console.log(firstBoxValue);
    console.log(secondBoxValue);

    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let secondBoxInt = parseFloat(secondBoxValue);
    let product = firstBoxInt * secondBoxInt;
    console.log(product);
    resultBox.textContent = 'The result is: ' + product; 

    addToList(firstBoxInt, secondBoxInt , "*", product);
}

function division()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');
    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length === 0)
    {
        alert("Please fill out both boxes before proceeding!")
        return;
    }
    console.log(firstBoxValue);
    console.log(secondBoxValue);

    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let secondBoxInt = parseFloat(secondBoxValue);
    let divisor = firstBoxInt / secondBoxInt;
    console.log(divisor);
    resultBox.textContent = 'The result is: ' + divisor;
    
    addToList(firstBoxInt, secondBoxInt , "/", divisor);
}

function exponent()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');
    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length === 0)
    {
        alert("Please fill out both boxes before proceeding!")
        return;
    }
    console.log(firstBoxValue);
    console.log(secondBoxValue);

    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let secondBoxInt = parseFloat(secondBoxValue);
    let exponent = firstBoxInt ** secondBoxInt;
    console.log(exponent);
    resultBox.textContent = 'The result is: ' + exponent; 

    addToList(firstBoxInt, secondBoxInt , "^", exponent);
}

function squareRoot()
{
    let firstBox = document.querySelector('#firstValue');
    let secondBox = document.querySelector('#secondValue');

    let firstBoxValue = firstBox.value;
    let secondBoxValue = secondBox.value;
    if (firstBoxValue.length === 0 || secondBoxValue.length > 0)
    {
        alert("Please fill out the first box before proceeding for square root! Also make sure second value box is empty!")
        return;
    }
    console.log(firstBoxValue);
    let resultBox = document.querySelector('#result');
    let firstBoxInt = parseFloat(firstBoxValue);
    let root = Math.sqrt(firstBoxInt);
    console.log(root);
    resultBox.textContent = 'The result is: ' + root;

    addToList("N/A", firstBoxInt , "√", root);

}

function addToList(first, second, operator, result)
{
    let nameListElement = document.querySelector('ol');

    let newListItemTwo = document.createElement('li');
    newListItemTwo.textContent = `${first} ${operator} ${second} = ${result}`;
    nameListElement.appendChild(newListItemTwo);
}

