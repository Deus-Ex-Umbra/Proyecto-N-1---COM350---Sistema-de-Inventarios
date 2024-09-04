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


function cargarItemsPorProducto(_idproducto, _codeinv) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "../php/viewitem.php?code_prod=" + _idproducto + "&code_inv=" + _codeinv, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status) {
            document.getElementById("t" + _idproducto).innerHTML = ajax.responseText;
        }
    }
    ajax.send();
}



function incrementAmount(button) {
    let amountSpan = button.closest('.total-amount').querySelector('.amount-value');
    let currentAmount = parseInt(amountSpan.textContent);
    amountSpan.textContent = currentAmount + 1;
    showConfirmButtons(button);
}

function decrementAmount(button) {
    let amountSpan = button.closest('.total-amount').querySelector('.amount-value');
    let currentAmount = parseInt(amountSpan.textContent);
    if (currentAmount > 0) {
        amountSpan.textContent = currentAmount - 1;
        showConfirmButtons(button);
    }
}

function showConfirmButtons(button) {
    let confirmButtons = button.closest('.total-amount').querySelector('.confirm-buttons');
    confirmButtons.style.display = 'block';
}

function cancelChange(button) {
    let totalAmountCell = button.closest('.total-amount');
    let originalAmount = totalAmountCell.getAttribute('data-original-amount');
    let amountSpan = totalAmountCell.querySelector('.amount-value');
    amountSpan.textContent = originalAmount;
    let confirmButtons = totalAmountCell.querySelector('.confirm-buttons');
    confirmButtons.style.display = 'none';
}


function confirmChange(button, codeItem, codeinv) {
    let totalAmountCell = button.closest('.total-amount');
    let newAmount = totalAmountCell.querySelector('.amount-value').textContent;
    window.location.href = `updatequantityitem.php?code_item=${codeItem}&new_amount=${newAmount}&code_inv=${codeinv}`;
}