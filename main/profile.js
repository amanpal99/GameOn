(function() {
    $('form > input').keyup(function() {

        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#submit').attr('disabled', 'disabled');
            $('#submit').css('background-color', 'grey');
        } else {
            $('#submit').removeAttr('disabled');
            $('#submit').css('background-color', 'rgba(0, 136, 169, 1)');
        }
    });
})()

/* instead of form we can use the IDs of certain fields only. In case not all fields are mandatory */
