
//JAVASCRIPT
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
    function (menuItem) {
        menuItem.addEventListener("click", toggleMenu);
    }
)

function volumenBajo() {
    document.getElementById("bg_music_index").volume /= 6;
}

//FIN DE JAVASCRIPT


//JQUERY

//METODO PARA SACAR INFORMACION DE LA PAGINA JUEGOS
const getGameInfo = (idImagen) => {
    // mediante AJAX se hará una llamada al archivo seleccionarJuego.php y le pasaremos
    // por parámetro el id de la imagen que se ha clicado
    $.ajax({
        url: "seleccionarJuego.php?idGame=" + idImagen, // url de la llamada
        type: "GET", // tipo GET para que devuelva los datos
        dataType: "json" // el tipo de dato que devolverá será en formato JSON para poder tratarlo con JavaScript
    }).done((response) => { // si la llamada es correcta
        $(response).each((_i, element) => { // recorremos la respuesta y vaciamos los divs correspondientes con el contenido anterior para después añadir los datos
            $('#id-title-game').empty().append(element.TITLE_GAME);
            $('#id-release-date').empty().append(element.RELEASE_DATE);
            $('#id-game-description').empty().append(element.GAME_DESC);
            $('#id-game-trailer').attr('src', element.URL_TRAILER);
        });
    }).fail((error) => { // si la llamada falla
        console.log(error, "fail"); // muestra por consola el error
    });
}
//FIN DEL METODO JUEGOS

//METODO DE VALIDACION DE FORMULARIOS

//VALIDAR LOGIN
$(function () {
    $('#formulario-log').validate({
        rules:{
            userName: "required",
            userPass: "required"
        },
        messages:{
            userName: "Rellene el campo nombre",
            userPass: "Rellene el campo contraseña"
        }
    });
});

//VALIDAR REGISTRO
$(function () {
    $('#formulario-reg').validate({
        rules:{
            userName:{
                required : true,
                minlength: 3,
                maxlength: 10

            }, 
            userPass:{
                required: true,
                minlength: 4,
                
            },
            userMail:{
                required : true,
                email:true
            }
        },
        messages:{
            userName: {
                required: "*Campo nombre obligatorio",
                minlength: "*3 caracteres mínimo",
                maxlength: "*10 caracteres máximo"
            },
            userPass:{
                required: "*Campo contraseña obligatorio",
                minlength: "*4 caracteres mínimo"
            },
            userMail:{
                required: "*El email es obligatorio",
                email: "Formato incorrecto de correo"
            } 
        }
    });
});
