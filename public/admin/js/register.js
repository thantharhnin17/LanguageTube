$(document).ready(function() {

    $('#teach_language').on('change', function() {
        var teach_language_id = $(this).val();
        if(teach_language_id) {
            $.ajax({
                url: '/register/teacher/get-teach-levels/'+teach_language_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#level-div').empty();
                    $('#level-div').show();
                    $('#level-div').append(`<label class="form-label">Teach Level</label><br>`);
                    $.each(data, function(key, value) {
                        $('#level-div').append(`<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="teacher[level[]]" value="`+key+`">
                        <label class="form-check-label" for="teacher[level[]]">`+value+`</label>
                    </div>`);
                    });
                }
            });
        } else {
            $('#level-div').empty();
            $('#level-div').hide();
        }
    });
});