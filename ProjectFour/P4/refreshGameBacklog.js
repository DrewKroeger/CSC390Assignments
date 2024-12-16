/**DREW KROEGER/OWEN MANLEY- CSC390 PROJECT 4
 * This is an ajax page, it connects to the submitButtonBackendPage.php(to get json info), and that 
 * connects to the backlogPage.php
 */

window.onload = function() {
    console.debug("page is ready");

    
    let reloadButton = document.querySelector('#submitGameDataButton');

    
    reloadButton.addEventListener('click', onReloadButtonClick);
}

async function onReloadButtonClick(event) {
    event.preventDefault();

    const formData = new FormData(document.getElementById('addGameForm'));
    const response = await fetch("submitButtonBackend.php", { //this is the submitButtonBackend waiting to receive data from the add game form
        method: 'POST',
        body: formData
    });

    const gameData = await response.json();

    console.log(gameData);


    let gameDetailDiv = document.querySelector('#backlogDetail'); 
    

    let newParagraph = document.createElement('p');
    newParagraph.innerHTML = `
        Game Name: ${gameData.game_name}<br>
        Platform: ${gameData.game_platform}<br>
        Date Created: ${gameData.date_created}<br>
        Date Started:  <br>
        Date Completed: <br>

        <form action="deleteButtonBackend.php" method="POST">
                    <input type="hidden" name="backlog_id" value="${gameData.backlog_id}">
                    <button type="submit">Delete</button>
                </form>

        <form action="startButtonBackend.php" method="POST">
            <input type="hidden" name="date_created" value="${gameData.date_created}" >
            <button type="submit">Start Game</button>
        </form>

        <form action="completedButtonBackend.php" method="POST">
            <input type="hidden" name="date_created" value="${gameData.date_created}">
            <button type="submit">Complete Game</button>
        </form>
    `;
    gameDetailDiv.append(newParagraph);

    document.getElementById('addGameForm').reset();

}
