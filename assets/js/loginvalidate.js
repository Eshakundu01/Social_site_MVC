$(function () {
  $("#show").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });

  $('#email').on('change', function() {
    var input = $(this).val();

    if (input != "") {
      $.ajax ({

        url:'/login/authenticate',
        method:'POST',
        data:{mailid:input},

        success:function(data) {
          if (data) {
            $('#email-error').html(data);
            $('#email-error').css("display", "block");
            $('#login').prop("disabled", true);
          } else {
            $('#email-error').html(data);
            $('#email-error').css("display", "block");
            $('#login').prop("disabled", false);
          }
        }
      });
    } else {
      $('#email-error').css("display", "none");
    }
  });

  $('#pass').keyup(function() {
    var value = $(this).val();

    if (value != "") {
      $.ajax ({

        url:'/login/authenticate',
        method:'POST',
        data:{code:value},

        success:function(data) {
          if (data) {
            $('#pass-error').html(data);
            $('#pass-error').css("display", "block");
            $('#login').prop("disabled", true);
          } else {
            $('#pass-error').html(data);
            $('#pass-error').css("display", "block");
            $('#login').prop("disabled", false);
          }
        }
      });
    } else {
      $('#pass-error').css("display", "none");
    }
  });

});