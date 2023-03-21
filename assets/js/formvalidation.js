$(function () {
  $("#show").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
    $("#code").attr("type", type);
  });


  $("#name").on("change", function() {
    var username = $(this).val();

    if (validateName(username)) {
      $("#name-error").html("");
      $('#register').prop("disabled",false);
    } else {
      $("#name-error").html("Only alphabets and space are allowed");
      $('#register').prop("disabled",true);
    }

    if (username.length < 5) {
      $("#name-error").html("Please provide your full name");
      $('#register').prop("disabled",true);
    }
  });

  function validateName(name) {
    var pattern = /^[a-zA-Z-' ]+$/;

    return $.trim(name).match(pattern) ? true : false;
  }

  $("#mail").on("change", function() {
    var emailid = $(this).val();

    if (validateEmail(emailid)) {
      $(this).css({
        color: "green",
        border: "1px solid green"
      });
      $("#mail-error").html("");
      $('#register').prop("disabled",false);
    } else {
      $(this).css({
        color: "red",
        border: "1px solid red"
      });
      $("#mail-error").html("Email address must be of the format example@email.com");
      $('#register').prop("disabled",true);
    }
  });

  function validateEmail(email) {
    var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    return $.trim(email).match(pattern) ? true : false;
  }

  $("#code").keyup(function(){
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($('#code').val().length < 8) {
      $('#password-error').html("Weak password should be atleast 8 characters");
      $('#register').prop("disabled",true);
    } else {
      if ($('#code').val().match(number) && $('#code').val().match(alphabets) && $('#code').val().match(special_characters)) {
        $('#password-error').html("");
        $('#register').prop("disabled",false);
      } else {
        $('#password-error').html("Password must include alphabets, numbers and special characters or some combination");
        $('#register').prop("disabled",true);
      }
    }
  });

});
