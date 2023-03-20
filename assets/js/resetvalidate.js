$(function () {
  $('#mail').keyup(function() {
    var input = $(this).val();

    if (input != "") {
      $.ajax ({

        url:'/reset/authenticate',
        method:'POST',
        data:{mail:input},

        success:function(data) {
          if (data) {
            $('#mail-error').html(data);
            $('#mail-error').css("display", "block");
            $('#submit').prop("disabled", true);
          } else {
            $('#mail-error').html(data);
            $('#mail-error').css("display", "block");
            $('#submit').prop("disabled", false);
          }
        }
      });
    } else {
      $('#mail-error').css("display", "none");
    }
  });

  $('#submit').on('click',function(e){
    e.preventDefault();
    $('#otpbox').modal('toggle');

  });
});