$(document).ready(function() {
    $('#summernote').summernote();


    $('#course_language').on('change', function() {
        var course_language_id = $(this).val();
        if(course_language_id) {
            $.ajax({
                url: '/get-levels/'+course_language_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#level-div').empty();
                    $('#level-div').show();
                    $('#level-div').append(`<label class="col-form-label">Course Language</label>
                                            <div>
                                              <select class="form-control" name="course_level" id="course_level">
                                                <option selected value="">Choose Level</option>`);
                    $.each(data, function(key, value) {
                        $('#course_level').append('<option value="'+key+'">'+value+'</option>');
                    });
                    $('#level-div').append(`</select>
                                  </div>`);
                }
            });
        } else {
            $('#level-div').empty();
            $('#level-div').hide();
        }
    });
});