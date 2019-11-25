$(function() {
    // Mostrar modal  Advertencia eliminar usuario
    $("#botonModAdv").click(function() {
        $('.ui.basic.modal')
            .modal('show');
    })

    // cerrar mensaje
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade');
        });
});