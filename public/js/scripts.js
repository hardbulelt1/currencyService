jQuery(function ($) {
    $(".date").datepicker({
        autoclose: true,
        onSelect: function (dateText) {
            $.ajax
            ({
                url: "/currency?date=" + $('.date').val(),
                success: function (result) {
                    if (result.data.type == 'Error') {
                        $('.result').html(result.data.attributes.message);
                    } else {
                        $('.result').html(
                            'USD: ' + result.data.attributes.usd + ', EURO: ' + result.data.attributes.euro
                        );
                    }
                }
            });
        }
    });

});