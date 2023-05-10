$(document).ready(function () {

    $('input[name="class_type"]').on('change', function () {
        var classType = $('input[name="class_type"]:checked').val();
        if (classType == "online") {
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