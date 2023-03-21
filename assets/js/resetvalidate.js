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
          } else {
            $('#otp-error').html(data);
            $('#resend').prop("disabled", true);
          }
        }
      });
    }
  });


  $(".view").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $(".pass").attr("type", type);
  });

  $('#verified').on('click', function() {
    $('#resetbox').modal('show');
  });

  $('#resend').on('click', function() {
    $('#otpbox').modal('show');
    var input = $('#mail').val();
    if (input != "") {
      $.ajax ({
        url:'/reset/action',
        method:'POST',
        data:{email:input},
        success:function(data) {
          if (data) {
            $('#resend').prop("disabled", true);
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
