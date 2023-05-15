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