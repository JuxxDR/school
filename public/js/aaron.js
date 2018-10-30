$(function () {
    $('#consultar').on('click', FechaModal);
    $('#creartarea').on('click', TareaModal);
    $('[data-docente]').on('click', DocenteModal)
});

function FechaModal() {
    //show
    $('#FechaModal').modal('show');
}

function TareaModal() {
    //show
    $('#TareaModal').modal('show')
}

function DocenteModal() {
    //id
    var docente_id = $(this).data('docente');
    $('#docente_id').val(docente_id);
    //email
    var docente_email = $(this).parent().prev().prev().prev().text();
    $('#email').val(docente_email);
    //show
    $('#DocenteModal').modal('show')
}