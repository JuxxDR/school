$(function () {
    $('[data-anuncio]').on('click', AnuncioModal);

});

function AnuncioModal() {
    //id
    var student_id = $(this).data('anuncio');
    $('#student_id').val(student_id);
    //show
    $('#AnuncioAlumnoModal').modal('show');
}