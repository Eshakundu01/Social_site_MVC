$(function () {
  $("#show").on('click', function () {
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
        dataType:'json',

        success:function(data) {
          if (data.error) {
            $('#email-error').html(data.error);
            $('#email-error').css("display", "block");
            $('#login').prop("disabled", true);
          } else {
            $('#email-error').html("");
            $('#email-error').css("display", "block");
            $('#login').prop("disabled", false);
          }
        }
      });
    } else {
      $('#email-error').css("display", "none");
    }
  });

  $('#pass').on('keyup', debounce(function() {
    var value = $(this).val();

    if (value != "") {
      $.ajax ({

        url:'/login/authenticate',
        method:'POST',
        data:{code:value},
        dataType: 'json',

        success:function(data) {
          if (data.error) {
            $('#pass-error').html(data.error);
            $('#pass-error').css("display", "block");
            $('#login').prop("disabled", true);
          } else {
            $('#pass-error').html("");
            $('#pass-error').css("display", "block");
            $('#login').prop("disabled", false);
          }
        }
      });
    } else {
      $('#pass-error').css("display", "none");
    }
  },1000));

  function debounce(callback, interval, immediate) {
    var timeout;
  
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) callback.apply(context, args);
      };          
  
      var callNow = immediate && !timeout;
  
      clearTimeout(timeout);
      timeout = setTimeout(later, interval);
  
      if (callNow) callback.apply(context, args);
    };
  }

  $("#g-btn").hover(function() {
    $.ajax ({
      url: '/home/login',
      dataType: 'json',

      success:function(response) {
        $("#sign-in").attr("href",response.url);
      }
    });
  });
});
