$(document).ready(function () {

    $('#course_name').on('change', function() {
        var course_name_id = $(this).val();
        // console.log(course_name_id);
        if(course_name_id) {
            $.ajax({
                url: 'get-teachers/'+course_name_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#teacher-div').empty();
                    $('#teacher-div').show();
                    $('#teacher-div').append(`<label class="col-form-label">Course Language</label>
                                            <div>
                                              <select class="form-control" name="course_teacher" id="course_teacher">
                                                <option selected value="">Choose teacher</option>`);
                    $.each(data, function(key, value) {
                        $('#course_teacher').append('<option value="'+key+'">'+value+'</option>');
                    });
                    $('#teacher-div').append(`</select>
                                  </div>`);
                }
            });
        } else {
            $('#teacher-div').empty();
            $('#teacher-div').hide();
        }
    });

    $('input[name="class_type"]').on('change', function () {
        var classType = $('input[name="class_type"]:checked').val();
        if (classType == "1") {
            $('#online-div').show();
        } else {
        $('#online-div').hide();
        }
    });
});
// $(document).ready(function () {
//     $('input[name="class_type"]').on('change', function () {
//         var classType = $('input[name="class_type"]:checked').val();
//         if (classType == "online") {
//             $.ajax({
//                 url: $('#online-info').data('url'),
//                 type: 'GET',
//                 success: function () {
//                     $('#online-div').empty();
//                     $('#online-div').show();
//                     $('#online-div').append(`<div class="form-group col-12">
//                     <label class="col-form-label">Meeting Link</label>
//                     <div>
//                         <input name="meeting_link" class="form-control" type="text" value="{{ old('meeting_link') }}">
//                         <span class="help-inline">@error('meeting_link'){{$message}}@enderror</span>
//                     </div>
//                 </div>

//                 <div class="form-group col-12">
//                     <label class="col-form-label">Group Chat Link</label>
//                     <div>
//                         <input name="group_chat_link" class="form-control" type="text" value="{{ old('group_chat_link') }}">
//                         <span class="help-inline">@error('group_chat_link'){{$message}}@enderror</span>
//                     </div>
//                 </div>`);
//                 },
//                 error: function () {
//                     console.log('error');
//                 }
//             });
//         } else {
//             // ...
//         }
//     });
// });