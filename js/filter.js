'use strict'

document.getElementById('btn-Filter').addEventListener('click', getData);

async function getData() {
    let filtro = document.getElementById('filter').value;
    console.log(filtro);
    // if (filtro == "-1") {
    //     // location.href = 'home';
    //     // return;
    //     // filtro = null;
    // }
    let url = `filter/${filtro}`;

    let response = await fetch(url);
    let respuesta = await response.text();
    vaciarTabla();
    document.getElementById('tableBody').innerHTML = respuesta;
}

function vaciarTabla() {
    /*let tabla = document.getElementById("tableBody");
    while (tabla.hasChildNodes()) {
        tabla.removeChild(tabla.lastChild);
    }*/

    let tabla = document.querySelector("#tableBody");
    tabla.innerHTML = "";
}