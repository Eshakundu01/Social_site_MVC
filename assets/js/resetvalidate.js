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

  $('#submit').on('click', function() {
    var input = $('#mail').val();
    if (input != "") {
      $('#loading').show();
      $.ajax ({
        url:'/reset/action',
        method:'POST',
        data:{email:input},
        success:function(data) {
          if (data) {
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

  $('#pin4').keyup(function() {

    var input = $('#pin1').val() + '' + $('#pin2').val() + '' + $('#pin3').val() + '' + $('#pin4').val();

    if (input != "") {
      $.ajax ({
        url:'/reset/authenticate',
        method:'POST',
        data:{key:input,
          email:$('#mail').val()},

        success:function(data) {
          if (data) {
            $('#otp-error').html(data);
            $('#resend').prop('disabled', false);
            $('#verified').prop("disabled", true);
          } else {
            $('#otp-error').html(data);
            $('#resend').prop("disabled", true);
            $('#verified').prop("disabled", false);
          }
        }
      });
    }
  });


  $("#view").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#key").attr("type", type);
  });

  $("#display").click(function () {
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
        success:function(data) {
          if (data) {
            $('#resend').prop("disabled", true);
            $('#verified').prop("disabled", false);
          }
        }
      });
    }
  });

  $("#key").keyup(function(){
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

  $("#pass").keyup(function(){
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
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

function clickEvent(first,last){
  if(first.value.length){
    document.getElementById(last).focus();
  }
}
