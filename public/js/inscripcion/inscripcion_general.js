$(document).ready(function () {
    document.getElementById("btn-confirm-all").addEventListener("click", function () {
        let $form = $('form');
        let $url = $form.attr('action');
        $url += "?confirmation=1&save_data=1";
        $form.attr('action', $url).submit();
    });
});
