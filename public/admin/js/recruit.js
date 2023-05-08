// $(document).ready(function() {
//     $('input[name="status"]').on('change', function() {
//         var formData = $('#statusForm').serialize();
//             $.ajax({
//                 url: $('#statusForm').attr('action'),
//                 method: 'POST',
//                 data: formData,
//                 success: function(response) {
//                     // console.log(response);
//                 },
//                 error: function(error) {
//                     console.log(error);
//                 }
//             });
//     });
// });

$(document).ready(function() {
    $('input[name="status"]').on('change', function() {
        var formId = $(this).closest('form').attr('id'); // get the ID of the closest form element
        var formData = $('#' + formId).serialize(); // use the ID to get the form data
        $.ajax({
            url: $('#' + formId).attr('action'),
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

