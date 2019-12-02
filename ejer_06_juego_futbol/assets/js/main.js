// Vista de  las tablas de apuestas y movimientos
$(function() {
    $("#tabla-apuestas").css("display", "none");
    $("#tabla-movimientos").css("display", "none");
});

function showBets() {
    $("#panel").removeClass("is-active");
    $("#li-apuestas").addClass("title");
    $("#apuestas").addClass("is-active");
    $("#li-movimientos").removeClass("title");
    $("#movimientos").removeClass("is-active");
    $("#tabla-apuestas").fadeIn(1000).css("display", "block");
    $("#anuncio").fadeIn(1000).css("display", "none");
    $.ajax({
        type: "GET",
        url: "../partidos/sw_apuestas.php",
        success: function(data) {
            console.log(data);
            //var obj = JSON.parse(data);
            if (data.length > 0) {
                $("#table_bets").empty();
                for (var i = 0; i < data.length; i++) {
                    $("#table_bets").append("<tr>");

                    $("#table_bets").append("<td>" + data[i].bet_cant_apostada + "€</td>");
                    $('#table_bets').append("<td>" + data[i].bet_minuto_apuesta + "</td>");
                    $('#table_bets').append("<td>" + data[i].bet_minuto_gol + "</td>");
                    $('#table_bets').append("<td>" + data[i].game_partido + "</td>");
                    $('#table_bets').append("<td>" + data[i].game_fecha + "</td>");
                    $('#table_bets').append("<td>" + data[i].bet_fecha_apuesta + "</td>");
                    $('#table_bets').append("<td>" + data[i].bet_premio + "</td>");
                    $('#table_bets').append("<td>" + data[i].bet_estado + "</td>");

                    $('#table_bets').append("<td>" + data[i].user_nick + "</td>");
                    $('#table_bets').append("<td>" + data[i].user_mail + "</td>");

                    $("#table_bets").append("</tr>");

                }
            } else {
                alert(data.msg);
            }
        },
        error: function(data) {
            alert("Error");
        }
    });
}


function showMov() {
    $("#panel").removeClass("is-active");
    $("#li-apuestas").removeClass("title");
    $("#apuestas").removeClass("is-active");
    $("#li-movimientos").addClass("title");
    $("#movimientos").addClass("is-active");
    $("#tabla-apuestas").css("display", "none");
    $("#tabla-movimientos").fadeIn(1000).css("display", "block");
    $("#anuncio").fadeIn(1000).css("display", "none");
    $.ajax({
        type: "GET",
        url: "../partidos/sw_movimientos.php",
        success: function(data) {
            console.log(data);
            if (data.length > 0) {
                $("#table_mov").empty();
                for (var i = 0; i < data.length; i++) {
                    $("#table_mov").append("<tr>");
                    $("#table_mov").append("<td>" + data[i].mov_id + "</td>");
                    $("#table_mov").append("<td>" + data[i].user_nick + "</td>");
                    $('#table_mov').append("<td>" + data[i].mov_cantidad + "€</td>");
                    $('#table_mov').append("<td>" + data[i].mov_fecha + "</td>");

                    $("#table_mov").append("</tr>");

                }
            } else {
                alert(data.msg);
            }
        },
        error: function(data) {
            alert("Error");
        }
    });
}