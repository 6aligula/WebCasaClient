$(document).ready(function () {
    //Se muestra la ultima medida de temp y humedad cuando se entra en la pagina cliente.
    google.charts.setOnLoadCallback(drawChartInici);
    //lanzaTuberia();
});

//lanzaTuberia();
//cargaDatos();
//script que genera los medidores de temperatura y humedad proporcionados por google
//google.charts.load('current', { 'packages': ['gauge'] });
//google.charts.setOnLoadCallback(drawChart);
/*fin de programa*/

//funcion para cargar la base de datos cada 14min
function lanzaTuberia() {
    //llama al fichero (getSetTempHume.php) que lee el txt, sube los datos a la BD y borra el txt.
    //setInterval(function () {
        $.ajax({
            url: "lanzaTuberia.php",
            type: 'GET',
            dataType: 'json',
            async: false,
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (data.val == 1) {
                    //alert("Carga de datos correcta");
                    console.log("Tuberia en marcha");
                } else {
                    alert("fallo en la tuberia");
                }

            },
            error: function (data) {
                alert('Fallo en el fichero lanzaTuberia.php! ' + data.val);
            }
        });
    //}, 840000);
}
//funcion para cargar la base de datos cada 16min
function cargaDatos() {
    //llama al fichero (getSetTempHume.php) que lee el txt, sube los datos a la BD y borra el txt.
    setInterval(function () {
        $.ajax({
            url: "getSetTempHume.php",
            type: 'GET',
            dataType: 'json',
            async: true,
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (data.val == 1) {
                    //alert("Carga de datos correcta");
                    console.log("Carga de datos correcta");
                } else {
                    alert("carga incorrecta");
                }

            },
            error: function (data) {
                alert('Fallo en el fichero getSetTempHume.php! ' + data.val);
            }
        });
    },960000/* 60000 */);
}
//funcion para cargar la base de datos al inicio 
function cargaDatosInici() {
    //llama al fichero (getSetTempHume.php) que lee el txt, sube los datos a la BD y borra el txt.
    $.ajax({
        url: "getSetTempHume.php",
        type: 'GET',
        dataType: 'json',
        async: true,
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (data.val == 1) {
                //alert("Carga de datos correcta");
                console.log("Carga de datos correcta");
            } else {
                alert("carga incorrecta");
            }

        },
        error: function (data) {
            alert('Fallo en el fichero getSetTempHume.php! ' + data.val);
        }
    });

}

//funcion para dibujar los medidores 
function drawChart() {
    //datos
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Humedad', 0],
        ['Temperatura', 0]

    ]);
    /* opciones  */
    var options = {
        width: 400, height: 400,
        redFrom: 90, redTo: 100,
        yellowFrom: 75, yellowTo: 90,
        minorTicks: 5
    };
    //creando el medidor
    //se actualiza cada 16.5(960 500ms) min porque el sensor lee cada 15(900 000ms) min
    var chart = new google.visualization.Gauge(document.getElementById('Medidores'));

    chart.draw(data, options);

    setInterval(function () {
        var JSON = $.ajax({
            url: "DatoSensores.php?q=1",
            dataType: 'json',
            async: false
        }).responseText;
        var Respuesta = jQuery.parseJSON(JSON);

        //posicion 0 de columna 1
        data.setValue(1, 1, Respuesta[0].humedad);
        data.setValue(0, 1, Respuesta[0].temperatura);
        chart.draw(data, options);
    }, 960500/* 90000 */);

}
//funcion para dibujar los medidores cuando entras a cliente.php
function drawChartInici() {
    //datos
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Humedad', 0],
        ['Temperatura', 0]

    ]);
    /* opciones  */
    var options = {
        width: 400, height: 400,
        redFrom: 90, redTo: 100,
        yellowFrom: 75, yellowTo: 90,
        minorTicks: 5
    };
    //creando el medidor
    var chart = new google.visualization.Gauge(document.getElementById('Medidores'));

    chart.draw(data, options);

    var JSON = $.ajax({
        url: "DatoSensores.php?q=1",
        dataType: 'json',
        async: false
    }).responseText;
    var Respuesta = jQuery.parseJSON(JSON);

    //posicion 0 de columna 1
    data.setValue(1, 1, Respuesta[0].humedad);
    data.setValue(0, 1, Respuesta[0].temperatura);
    chart.draw(data, options);

}