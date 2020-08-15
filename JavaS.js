 // hide all the divs
    $('div').hide()

    // Show and hide selected div
    $('#cases').change(function () {
        var value = this.value;

        $('div').hide()
        $('#' + this.value).show();
    });