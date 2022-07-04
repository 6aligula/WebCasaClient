$(document).ready(function () {

    $('#enciende').click(function () {
        //saco el valor accediendo a un input de tipo text y name = tireqty
        //var on=($('input:radio[name=on]').val);
        var on = ($('#enciende').attr('name'));
        //alert(on); 
        document.location.href = "calderaOn.php?on=" + on;
        //alert("Caldera Prendida");

    });

    $('#apaga').click(function () {
        //var off=($('input:radio[name=off]').val());
        var off = ($('#apaga').attr('name'));
        //alert(off);
        document.location.href = "calderaOff.php?off=" + off;
        //alert("Caldera apagada");
    });

    //bloque de codigo para tratar la lampara del lab

    $('#enciende2').click(function () {
        var on = ($('#enciende').attr('name'));
        document.location.href = "lamparaOn.php?on=" + on;
    });

    $('#apaga2').click(function () {
        //var off=($('input:radio[name=off]').val());
        var off = ($('#apaga').attr('name'));
        //alert(off);
        document.location.href = "lamparaOff.php?off=" + off;
        //alert("Caldera apagada");
    });

});