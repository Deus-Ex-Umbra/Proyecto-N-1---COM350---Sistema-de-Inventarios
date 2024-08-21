function mostrarCargando(_idelemento) {
    document.getElementById(_idelemento).innerHTML = "<div class='loading-spinner'></div>";
}

function cargarEnElemento(_idelemento, _archivo) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", _archivo, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status) {
            document.getElementById(_idelemento).innerHTML = ajax.responseText;
        }
    }
    ajax.send();
}

function cargarEnFuncion(_javascript, _archivo) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", _archivo, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status) {
            _javascript(ajax.responseText);
        }
    }
    ajax.send();
}

function cargarEnElementoFetch(_idelemento, _archivo) {
    console.log(_archivo);
    fetch(_archivo).then((response) => response.text()).then((data) => {
        document.getElementById(_idelemento).innerHTML = data;
    })
}

function cargarEnFuncionFetch(_javascript, _archivo) {
    fetch(_archivo).then((response) => response.text()).then((data) => {
        _javascript(data);
    })
}

function enviarFormularioFetch(_idformulario, _archivo, _idelemento) {
    fetch(_archivo, {
        method: "POST",
        body: new FormData(document.getElementById(_idformulario))
    }).then((response) => response.text()).then((data) => {
        document.getElementById(_idelemento).innerHTML = data;
    })
}

function enviarFormularioFetchFuncion(_idformulario, _archivo, _javascript) {
    fetch(_archivo, {
        method: "POST",
        body: new FormData(document.getElementById(_idformulario))
    }).then((response) => response.text()).then((data) => {
        _javascript(data);
    })
}

function enviarFormularioSend(_idformulario, _archivo, _idelemento) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", _archivo, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status) {
            document.getElementById(_idelemento).innerHTML = ajax.responseText;
        }
    }
    ajax.send(new FormData(document.getElementById(_idformulario)));
}

function enviarFormularioSendFuncion(_idformulario, _archivo, _javascript) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", _archivo, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status) {
            _javascript(ajax.responseText);
        }
    }
    ajax.send(new FormData(document.getElementById(_idformulario)));
}

function cargarInventarios() {
    cargarEnElemento("inventory", `../php/clean.php`);
    cargarEnElemento("inventory", "../php/inventory.php");
}

function cargarProductos(_idelemento) {
    mostrarCargando(_idelemento);
    cargarEnElemento("inventory", `../php/clean.php`);
    cargarEnElemento("inventory", `../php/product.php?code_inv=${_idelemento}`);
}

function cargarItem(_idelemento) {
    const divID = `t${_idelemento}`;
    const divElement = document.getElementById(divID);
    divElement.style.display = 'block'; 
    divElement.style.height = 'opx';
    if (divElement.innerHTML.trim() !== "") {
        divElement.innerHTML = "";
        divElement.style.display = "none";
    } else {
        divElement.style.display = "block";
        mostrarCargando(divID);
        cargarEnElementoFetch(divID, `../php/item.php?code_prod=${_idelemento}`);
    }
}


function eliminarItem(_iditem, _idproducto) {
    mostrarCargando(`t${_idproducto}`);
    fetch(`../php/deleteitem.php?code_item=${_iditem}&code_prod=${_idproducto}`)
        .then((response) => response.text())
        .then(() => {
            cargarEnElementoFetch(`t${_idproducto}`, `../php/item.php?code_prod=${_idproducto}`);
        });
}


cargarEnElemento("inventory", "../php/inventory.php");