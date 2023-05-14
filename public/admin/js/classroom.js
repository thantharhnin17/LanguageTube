$(document).ready(function () {

  function updateClassType() {
    var course_name = $('#course_name').val();
    var class_type = $('input[name="class_type"]:checked').val();
    
    // get CSRF token from meta tag
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
  
    // perform AJAX request
    $.ajax({
      type: 'POST',
      url: 'get-teachers/',
      data: {
        course_name: course_name,
        class_type: class_type
      },
      headers: {
        'X-CSRF-TOKEN': csrf_token // include CSRF token in headers
      },
      dataType: 'json',
      success: function(data) {
        // handle the response
        $('#teacher-div').empty();
        $('#teacher-div').show();
        $('#teacher-div').append(`<label class="col-form-label">Course Teacher</label>
                                      <div>
                                        <select class="form-control" name="course_teacher" id="course_teacher">
                                          <option selected value="">Choose teacher</option>`);
        $.each(data, function(key, value) {
          $('#course_teacher').append('<option value="'+key+'">'+value+'</option>');
        });
        $('#teacher-div').append(`</select>
                                </div>`);
      },
      error: function(xhr, status, error) {
        // handle the error
        console.log(error);
      }
    });
  }
  

  updateClassType();

  $('#course_name').on('change', updateClassType);
  $('input[name="class_type"]').on('change', updateClassType);


    // $('input[name="status"]').on('change', function() {
    //     var formId = $(this).closest('form').attr('id'); // get the ID of the closest form element
    //     var formData = $('#' + formId).serialize(); // use the ID to get the form data
    //     $.ajax({
    //         url: $('#' + formId).attr('action'),
    //         method: 'POST',
    //         data: formData,
    //         success: function(response) {
    //             // console.log(response);
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // });
    

    // $('#course_name').on('change', function() {
    //     var course_name_id = $(this).val();
    //     // console.log(course_name_id);
    //     if(course_name_id) {
    //         $.ajax({
    //             url: 'get-teachers/'+course_name_id,
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function(data) {
    //                 $('#teacher-div').empty();
    //                 $('#teacher-div').show();
    //                 $('#teacher-div').append(`<label class="col-form-label">Course Teacher</label>
    //                                         <div>
    //                                           <select class="form-control" name="course_teacher" id="course_teacher">
    //                                             <option selected value="">Choose teacher</option>`);
    //                 $.each(data, function(key, value) {
    //                     $('#course_teacher').append('<option value="'+key+'">'+value+'</option>');
    //                 });
    //                 $('#teacher-div').append(`</select>
    //                               </div>`);
    //             }
    //         });
    //     } else {
    //         $('#teacher-div').empty();
    //         $('#teacher-div').hide();
    //     }
    // });


    ////////////////
    
    var classType = $('input[name="class_type"]:checked').val();
        if (classType == "1") {
            $('#online-div').show();
        } else {
        $('#online-div').hide();
        }

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