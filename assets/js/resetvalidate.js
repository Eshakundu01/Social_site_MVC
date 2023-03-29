$(function () {
  $('#mail').on("keyup", debounce(function() {
    var input = $(this).val();

    if (input != "") {
      $.ajax ({

        url:'/reset/authenticate',
        method:'POST',
        data:{mail:input},
        dataType:'json',

        success:function(data) {
          if (data.error) {
            $('#mail-error').html(data.error);
            $('#mail-error').css("display", "block");
            $('#submit').prop("disabled", true);
          } else {
            $('#mail-error').html("");
            $('#mail-error').css("display", "block");
            $('#submit').prop("disabled", false);
          }
        }
      });
    } else {
      $('#mail-error').css("display", "none");
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

  $('#submit').on('click', function() {
    var input = $('#mail').val();
    if (input != "") {
      $('#loading').show();
      $.ajax ({
        url:'/reset/action',
        method:'POST',
        data:{email:input},
        dataType:'json',
        success:function(data) {
          if (data.status) {
            $('#otpbox').modal('show');
            $('#loading').hide();
            $('#resend').prop("disabled", true);
          }
        }
      });
    } else {
      $('#mail-error').html("This field cannot be empty!");
    }
  });

  $('#pin4').on("keyup", function() {

    var input = $('#pin1').val() + '' + $('#pin2').val() + '' + $('#pin3').val() + '' + $('#pin4').val();

    if (input != "") {
      $.ajax ({
        url:'/reset/authenticate',
        method:'POST',
        data:{key:input,
          email:$('#mail').val()},
        dataType: 'json',

        success:function(data) {
          if (data.error) {
            $('#otp-error').html(data.error);
            $('#resend').prop('disabled', false);
            $('#verified').prop("disabled", true);
          } else {
            $('#otp-error').html("");
            $('#resend').prop("disabled", true);
            $('#verified').prop("disabled", false);
          }
        }
      });
    }
  });


  $("#view").on("click", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#key").attr("type", type);
  });

  $("#display").on("click", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#pass").attr("type", type);
  });

  $('#verified').on('click', function() {
    $('#resetbox').modal('show');
    $('#reset').prop("disabled", true);
  });

  $('#resend').on('click', function() {
    $('#otp-error').text('');
    var input = $('#mail').val();
    if (input != "") {
      $.ajax ({
        url:'/reset/action',
        method:'POST',
        data:{email:input},
        dataType: 'json',
        success:function(data) {
          if (data.status) {
            $('#resend').prop("disabled", true);
            $('#verified').prop("disabled", false);
          }
        }
      });
    }
  });

  $("#key").on("keyup", function(){
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($(this).val().length < 8) {
      $('#pass-error').html("Weak password should be atleast 8 characters");
      $('#reset').prop("disabled",true);
    } else {
      if ($(this).val().match(number) && $(this).val().match(alphabets) && $(this).val().match(special_characters)) {
        $('#pass-error').html("");
      } else {
        $('#pass-error').html("Password must include alphabets, numbers and special characters or some combination");
        $('#reset').prop("disabled",true);
      }
    }
  });

  $("#pass").on("keyup", function(){
    var newpass = $('#key').val();
    if ($(this).val() != newpass) {
      $('#key-error').html("Please re-enter the same password");
      $('#reset').prop("disabled",true);
    } else {
      $('#key-error').html("");
      $('#reset').prop("disabled",false);
    }
  });

  $('#reset').on('click', function() {
    var input = $('#pass').val();
    if (input != "") {
      $.ajax ({
        url:'/reset/change',
        method:'POST',
        data:{email:$('#mail').val(), password:input},
        dataType:'json',
        success:function(data) {
          if (data) {
            alert("Your password has been reset, use your new password to login");
            window.location = '/home/index';
          }
        }
      });
    }
  });

});

let digitValidate = function(ele){
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

function clickEvent(first,last){
  if(first.value.length){
    document.getElementById(last).focus();
  }
}
