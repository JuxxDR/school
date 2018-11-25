$(document).ready(function () {

    selectAlergia();
    selectCronicas();
    selectP1();
    selectP2();
    selectP3();
    selectP4();
    $('#select-alergia').change(function () {
        selectAlergia();
    });

    function selectAlergia() {
        var val = $('#select-alergia').val();
        if (val === "1") {
            $("#inp-alergia").show("slow");
        } else {
            $("#inp-alergia").hide();
            // $("#inp-alergia").attr('required', false);
        }
        var $val = $("#inp-alergia").find("input").val();
        $("#inp-alergia").find("input").val($val)
        // $("#inp-alergia").attr('required', true);
    }

    $('#select-cronicas').change(function () {
        selectCronicas();
    });

    function selectCronicas() {
        var val = $('#select-cronicas').val();
        if (val === "1") {
            $("#tr-cronicas").show("slow");
        } else {
            $("#tr-cronicas").hide();
            // $("#tr-cronicas").find("input").attr('required', false)
        }
        var $val = $("#tr-cronicas").find("input").val();
        $("#tr-cronicas").find("input").val($val);
        // $("#tr-cronicas").find("input").attr('required', true)
    }


    $('#select-p1').change(function () {
        selectP1();
    });

    function selectP1() {
        var val = $('#select-p1').val();
        if (val === "1") {
            $("#inp-p1").attr("disabled", false);
            // $("#inp-p1").attr("required", true);
        } else {
            $("#inp-p1").attr("disabled", true);
            // $("#inp-p1").attr("required", false);
        }
        $val = $("#inp-p1").val();
        $("#inp-p1").val($val);
    }

    $('#select-p2').change(function () {
        selectP2();
    });

    function selectP2() {
        var val = $('#select-p2').val();
        if (val === "1") {
            $("#inp-p2").attr("disabled", false);
            // $("#inp-p2").attr("required", true);
        } else {
            $("#inp-p2").attr("disabled", true);
            // $("#inp-p2").attr("required", false);
        }
        $val = $("#inp-p2").val();
        $("#inp-p2").val($val);
    }

    $('#select-p3').change(function () {
        selectP3();
    });

    function selectP3() {
        var val = $('#select-p3').val();
        if (val === "1") {
            $("#inp-p3").attr("disabled", false);
            // $("#inp-p3").attr("required", true);
        } else {
            $("#inp-p3").attr("disabled", true);
            // $("#inp-p3").attr("required", false);
        }
        $val = $("#inp-p3").val();
        $("#inp-p3").val($val);
    }

    $('#select-p4').change(function () {
        selectP4();
    });

    function selectP4() {
        var val = $('#select-p4').val();
        if (val === "1") {
            // $("#inp-p4").attr("required", true);
            $("#inp-p4").attr("disabled", false);
        } else {
            // $("#inp-p4").attr("required", false);
            $("#inp-p4").attr("disabled", true);
        }
        $val = $("#inp-p4").val();
        $("#inp-p4").val($val);
    }

});