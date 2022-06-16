/**
 * Función menú hamburguesa.
 */
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

/**
 * Función guiño Tom Nok icono navegador.
 */
function cambioTomNok() {
    var tom = $('#tom');
    console.log(tom.val());
    tom.mousedown(function () {
        console.log("OJO CERRADO");
        tom.attr('src', 'media/icon_main2.png');
    })
    tom.mouseup(function () {
        console.log("OJO ABIERTO");
        tom.attr('src', 'media/icon_main1.png');
    })
}
cambioTomNok();

/**
 * Función barra de búsqueda de la página store.php
 */
 function buscarProducto() {
    let input = document.getElementById('barra_busqueda').value;
    input=input.toLowerCase();
    let x = document.getElementsByClassName('caja-producto');
    let cont = 0;
    for (i = 0; i < x.length; i++) { 
        console.log(x[i].innerText);
        console.log(x.length);
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
            cont++;

            if (cont == x.length) {
                $('#no-resultado').css('display', 'block');
            }  
        }
        else {
            x[i].style.display="block";
            $('#no-resultado').css('display', 'none');
        }
    }
}

/**
 * Función que actualiza el total durante el proceso de compra, según se modifique la cantidad de producto.
 */
function actualizarTotal() {
    var item_quantity = $('#item_quantity').val();
    var item_price = $('#item_price').html();
    let ip = parseFloat(item_price);

    var total = $('#item_quantity').val() * $('#item_price').html();

    document.getElementById('totalOrder').innerHTML = (Math.round(total * 100) / 100).toFixed(2);
}

/**
 * Función que actualiza el método de pago seleccionado.
 */
const actualizarMetodoPago = () => {
    var metodoSeleccionado = $('#metodoPago');
    var selectedValue = $('option:selected', metodoSeleccionado).val();
    
    switch (selectedValue) {
        case 'contrareembolso':
            $('#metodoPagoC').css('display', 'block');
            $('#metodoPagoT').css('display', 'none');
            break;

        case 'tarjeta':
            $('#metodoPagoC').css('display', 'none');
            $('#metodoPagoT').css('display', 'block');
            break;
    }
}

/**
 * Función onClick para obtener y modificar la información en la página games.php según la imagen
 * que el usuario clique.
 * Mediante Ajax se hará una llamada al archivo selecconarJuego.php, pasándole por parámetro el id 
 * de la imagen que se ha clicado.
 *      url: url de la llamada
 *      type: ripo GET para que devuelva los datos
 *      dataType: el tipo de dato que devolverá, que será formato JSON para poder tratarlo con JS
 * 
 * Si la llamada es correcta (done), recorremos la respuesta, vaciando los divs del contenido
 * anterior y rellenándolos con los datos obtenidos.
 * Si la llamada falla (fail), muestra por consola el error.
 */
const getGameInfoOnClick = (idGame) => {
    $.ajax({
        url: "seleccionarJuego.php?idGame=" + idGame,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $(response).each((_i, element) => {
            $('#id-title-game').empty().append('<h2>' + element.TITLE_GAME + '</h2>');
            $('#id-release-date').empty().append(element.RELEASE_DATE);
            $('#id-trailer-game-name').empty().append(element.TITLE_GAME);
            $('#id-game-description').empty().append(element.GAME_DESC);
            $('#id-game-trailer').attr('src', element.URL_TRAILER);
            getCuriosities(idGame);
            getNews(idGame);
            getPlatforms(idGame);
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}

/**
 * Función onChange asignada al elemento select, similar a la función getGameInfoOnClick
 */
const getGameInfoOnChange = () => {
    var juegoSeleccionado = $('#juegoSeleccionado');
    var selectedValue = $('option:selected', juegoSeleccionado).val();
    console.log(selectedValue);
    $.ajax({
        url: "seleccionarJuego.php?idGame=" + selectedValue,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $(response).each((_i, element) => {
            $('#id-title-game').empty().append('<h2>' + element.TITLE_GAME + '</h2>');
            $('#id-release-date').empty().append(element.RELEASE_DATE);
            $('#id-trailer-game-name').empty().append(element.TITLE_GAME);
            $('#id-game-description').empty().append(element.GAME_DESC);
            $('#id-game-trailer').attr('src', element.URL_TRAILER);
            getCuriosities(selectedValue);
            getNews(selectedValue);
            getPlatforms(selectedValue);
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}

/**
 * Función que actualiza las curiosidades del juego seleccionado.
 */
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

/**
 * Función que actualiza las novedades del juego seleccionado.
 */
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

/**
 * Función que actualiza las plataformas del juego seleccionado.
 */
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

/**
 * Función para consultar los detalles del pedido seleccionado.
 * Impide el scroll en la página al activar el pop up con el detalle.
 */
const getOrderDetails = (idPedido) => {
    $.ajax({
        url: "consultarDetallesPedido.php?idPedido=" + idPedido,
        type: "GET",
        dataType: "json"
    }).done((response) => {
        $(response).each((_i, element) => {
            $('#popup').css('display', 'block');
            $('body').css('overflow', 'hidden');

            $('#order-ref').empty().append(element.ORDER_ID);
            $('#item-desc').empty().append(element.ITEM_DESCRIPTION);
            $('#item-quantity').empty().append(element.ITEM_QUANTITY);
            $('#item-price').empty().append(element.DETAIL_UNIT_PRICE);
            $('#order_date').empty().append(element.ORDER_DATE);
            $('#order-total').empty().append((Math.round((element.ITEM_QUANTITY * element.DETAIL_UNIT_PRICE) * 100) / 100).toFixed(2));
            $('#order_status').empty().append(element.STATUS);
        });
    }).fail((error) => {
        console.log(error, "fail");
    });
}

/**
 * Función para cerrar el pop up del detalle de pedido, permitiendo otra vez el scroll.
 */
const cerrarPopup = () => {
    $('body').css('overflow', 'auto ');
    $('#popup').css('display', 'none');
}

/**
 * Función para la validación del formulario de contacto.
 */
$(function () {
    $('#form-contact').validate({
        rules: {
            nombre: "required",
            correo: {
                required: true,
                email: true
            },
            mensaje: "required",
            politica: "required"
        },
        messages: {
            nombre: "*Nombre obligatorio",
            correo: {
                required: "*Correo obligatorio",
                email: "*Formato incorrecto"
            },
            mensaje: "*Mensaje obligatorio",
            politica: "*",
        }
    });
});

/**
 * Función para la validación del formulario de login.
 */
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

/**
 * Función para la validación del formulario de registro.
 */
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