function searchGames() {
    let input = document.getElementById("searchInput").value.toLowerCase();

    games.forEach(game => {
        let title = game.querySelector(".info-game span").textContent.toLowerCase();


        if (title.includes(input)) {
            game.style.display = "flex";
        } else {
            game.style.display = "none";
        }
    });


    if (input === "") {
        resetGameList();
    }
}


function resetGameList() {
    let games = document.querySelectorAll(".item-game");
    games.forEach(game => {
        game.style.display = "flex";
    });
}