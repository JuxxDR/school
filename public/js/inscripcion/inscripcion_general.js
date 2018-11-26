$(document).ready(function () {
    document.getElementById("btn-confirm-all").addEventListener("click", function () {
        let $form = $('form');
        let $url = $form.attr('action');
        $url += "?confirmation=1&save_data=1";
        $("#form_events").hide("slow");

        $("#wait").show("slow");
        $("#wait").attr("hidden", false);
        $form.attr('action', $url).submit();
    });

    document.getElementById("btn-save-changes").addEventListener("click", function () {
        let $form = $('form');
        let $url = $form.attr('action');
        $form.attr('action', $url).submit();
    });
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
});

