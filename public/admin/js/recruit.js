$(document).ready(function() {
    $('input[name="status"]').on('change', function() {
        var formData = $('#statusForm').serialize();
            $.ajax({
                url: $('#statusForm').attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    // console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
    });
});