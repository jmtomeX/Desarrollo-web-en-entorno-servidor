$(function() {
    // Mostrar modal  Advertencia eliminar usuario
    $(".botonModAdv").click(function() {
        $('#modal_ask_delete')
            .modal('show');
    });

    // cerrar mensaje
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade');
        });
});