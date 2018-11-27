$(function () {
    $('[data-docente]').on('click', DocenteModal);
});

function DocenteModal() {
    //id
    var docente_id = $(this).data('docente');
    $('#docente_id').val(docente_id);
    //email
    var docente_email = $(this).parent().prev().prev().prev().prev().prev().text();
    $('#email').val(docente_email);
    //show
    $('#DocenteModal').modal('show');
}