$(function () {
    $('#datetimepicker6').datetimepicker({
      format: 'D-MM-YYYY HH:mm'
    });
    $('#datetimepicker7').datetimepicker({
        //Important! See issue #1075
        format: 'D-MM-YYYY HH:mm'
    });
    $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
});