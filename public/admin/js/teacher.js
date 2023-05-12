$(document).ready(function () {

    ///////////////////



    var teach_language_id = $('#teach_language').val();
        if(teach_language_id) {
            $.ajax({
                url: 'get-levels/'+teach_language_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#level-div').show();
                    $.each(data, function(key, value) {
                        $('#tt_level').append('<div class="form-check form-check-inline"> \
                        <input class="form-check-input" type="checkbox" name="levels[]" value="'+key+'"> \
                        <label class="form-check-label" for="levels[]">'+value+'</label> \
                    </div>');
                    });
                }
            });
        } else {
            $('#tt_level').empty();
            $('#level-div').hide();
        }

    $('#teach_language').on('change', function() {
        var teach_language_id = $(this).val();
        if(teach_language_id) {
            $.ajax({
                url: 'get-levels/'+teach_language_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#level-div').show();
                    $.each(data, function(key, value) {
                        $('#tt_level').append('<div class="form-check form-check-inline"> \
                        <input class="form-check-input" type="checkbox" name="levels[]" value="'+key+'"> \
                        <label class="form-check-label" for="levels[]">'+value+'</label> \
                    </div>');
                    });
                }
            });
        } else {
            $('#tt_level').empty();
            $('#level-div').hide();
        }
    });

});