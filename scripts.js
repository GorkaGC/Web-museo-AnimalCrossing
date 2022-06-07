
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

const userInfo = () => {

}

//METODO PARA SACAR INFORMACION EN LA PAGINA JUEGOS
const getGameInfo = (idGame) => {
    // mediante AJAX se hará una llamada al archivo seleccionarJuego.php y le pasaremos
    // por parámetro el id de la imagen que se ha clicado
    $.ajax({
        url: "seleccionarJuego.php?idGame=" + idGame, // url de la llamada
        type: "GET", // tipo GET para que devuelva los datos
        dataType: "json" // el tipo de dato que devolverá será en formato JSON para poder tratarlo con JavaScript
    }).done((response) => { // si la llamada es correcta
        $(response).each((_i, element) => { // recorremos la respuesta y vaciamos los divs correspondientes con el contenido anterior para después añadir los datos
            $('#id-title-game').empty().append('<h2>' + element.TITLE_GAME + '</h2>');
            $('#id-release-date').empty().append(element.RELEASE_DATE);
            $('#id-trailer-game-name').empty().append(element.TITLE_GAME);
            $('#id-game-description').empty().append(element.GAME_DESC);
            $('#id-game-trailer').attr('src', element.URL_TRAILER);
            getCuriosities(idGame);
            getNews(idGame);
            getPlatforms(idGame);
        });
    }).fail((error) => { // si la llamada falla
        console.log(error, "fail"); // muestra por consola el error
    });
}

const getCuriosities = (idGame) => {
    $.ajax({
        url: "añadirCuriosidades.php?idGame=" + idGame,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $('#id-game-curiosities').empty();
        if (response == "") {
            $('#id-game-curiosities').html("No contiene información.");
        }
        $(response).each((_i, element) => {
            $('#id-game-curiosities').append('<li>' + element.DESCRIPTION + '</li>');
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}

const getNews = (idGame) => {
    $.ajax({
        url: "añadirNovedades.php?idGame=" + idGame,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $('#id-game-news').empty();
        if (response == "") {
            $('#id-game-news').html("No contiene información.");
        }
        $(response).each((_i, element) => {
            $('#id-game-news').append('<li>' + element.NEW_DESCRIPTION + '</li>');
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}

const getPlatforms = (idGame) => {
    $.ajax({
        url: "añadirPlataformas.php?idGame=" + idGame,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $('#id-game-platforms').empty();
        if (response == "") {
            $('#id-game-platforms').html("No contiene información.");
        }
        $(response).each((_i, element) => {
            $('#id-game-platforms').append('<li>' + element.PLATFORM_NAME + '</li>');
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}
//FIN DEL METODO JUEGOS


//METODO CONSULTAR DETALLES PEDIDO

const getOrderDetails = (idPedido) => {
    
    $.ajax({
        url: "consultarDetallesPedido.php?idPedido=" + idPedido, 
        type: "GET", 
        dataType: "json" 
    }).done((response) => {
        
        $(response).each((_i, element) => { 
            //$('#id-title-game').empty().append('<h2>' + element.TITLE_GAME + '</h2>');
            console.log(response);

            $('#order-ref').append(element.ORDER_ID);
            $('#item-desc').append(element.ITEM_DESCRIPTION);
            $('#item-quantity').append(element.ITEM_QUANTITY);
            $('#item-price').append(element.DETAIL_UNIT_PRICE);
            //alert("Nº PEDIDO: " + element.ORDER_ID + "\nPRODUCTO: " + element.ITEM_DESCRIPTION);
            
            // Add response in Modal body
            //$('.modal-body').html(response);

            // Display Modal
            $('#empModal').html(response); 
        });
    }).fail((error) => { 
        console.log(error, "fail"); 
    });
}

//FIN METODO CONSULTAR DETALLES PEDIDO

//METODO DE VALIDACION DE FORMULARIOS
//VALIDAR CONTACTO
$(function () {
    $('#form-contact').validate({
        rules: {
           nombre: "required",
           correo:{
            required: true,
            email: true
           }, 
           mensaje: "required",
           politica: "required"
        },
        messages: {
            nombre: "*Nombre obligatorio",
            correo:{
                required:"*Correo obligatorio",
                email:"*Formato incorrecto"
            },
            mensaje:"*Mensaje obligatorio", 
            politica: "*",
        }
    });
});

//VALIDAR LOGIN
$(function () {
    $('#formulario-log').validate({
        rules: {
            userName: "required",
            userPass: "required"
        },
        messages: {
            userName: "Rellene el campo nombre",
            userPass: "Rellene el campo contraseña"
        }
    });
});

//VALIDAR REGISTRO
$(function () {
    $('#formulario-reg').validate({
        rules: {
            userName: {
                required: true,
                minlength: 3,
                maxlength: 10

            },
            userPass: {
                required: true,
                minlength: 4,

            },
            userMail: {
                required: true,
                email: true
            }
        },
        messages: {
            userName: {
                required: "*Campo nombre obligatorio",
                minlength: "*3 caracteres mínimo",
                maxlength: "*10 caracteres máximo"
            },
            userPass: {
                required: "*Campo contraseña obligatorio",
                minlength: "*4 caracteres mínimo"
            },
            userMail: {
                required: "*El email es obligatorio",
                email: "Formato incorrecto de correo"
            }
        }
    });
});



