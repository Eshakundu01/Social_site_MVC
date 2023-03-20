$(function () {
  $('#mail').keyup(function() {
    var input = $(this).val();

    if (input != "") {
      $.ajax ({

        url:'/reset/authenticate',
        method:'POST',
        data:{mailid:input},

        success:function(data) {
          if (data) {
            $('#mail-error').html(data);
            $('#mail-error').css("display", "block");
            $('#reset').prop("disabled", true);
          } else {
            $('#mail-error').html(data);
            $('#mail-error').css("display", "block");
            $('#reset').prop("disabled", false);
          }
        }
      });
    } else {
      $('#mail-error').css("display", "none");
    }
  });
});