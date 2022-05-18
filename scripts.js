const menu = document.querySelector(".nav-links");
const menuItems = document.querySelectorAll(".menuItem");
const hamburger = document.querySelector(".hamburger");
const closeIcon = document.querySelector(".closeIcon");
const menuIcon = document.querySelector(".menuIcon");

function toggleMenu() {
    if (menu.classList.contains("showMenu")) {
        menu.classList.remove("showMenu");
        closeIcon.style.display = "none";
        menuIcon.style.display = "block";
    } else {
        menu.classList.add("showMenu");
        closeIcon.style.display = "block";
        menuIcon.style.display = "none";
    }
}

hamburger.addEventListener("click", toggleMenu);

menuItems.forEach(
    function(menuItem) {
        menuItem.addEventListener("click", toggleMenu);
    }
)



const getGameInfo = (idImagen) => {
    // mediante AJAX se hará una llamada al archivo seleccionarJuego.php y le pasaremos
    // por parámetro el id de la imagen que se ha clicado
    $.ajax({
        url: "seleccionarJuego.php?idGame=" + idImagen, // url de la llamada
        type: "GET", // tipo GET para que devuelva los datos
        dataType: "json" // el tipo de dato que devolverá será en formato JSON para poder tratarlo con JavaScript
    }).done((response) => { // si la llamada es correcta
        $(response).each((element) => { // recorremos la respuesta y vaciamos los divs correspondientes con el contenido anterior para después añadir los datos
            $('#id-title-game').empty().append(element.TITLE_GAME);
            $('#id-release-date').empty().append(element.RELEASE_DATE);
            $('#id-game-description').empty().append(element.GAME_DESC);
        });
    }).fail((error) => { // si la llamada falla
        console.log(error, "fail"); // muestra por consola el error
    });
}