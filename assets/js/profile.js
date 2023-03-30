$(function () {
  $("#imageUpload").on('change', function() {
    $("#uploadpic").css("display","block");
  });

  $("#cover").on('change', function() {
    $("#add").css("display", "none");
    $('#change').css("display", "block");
  });

  $("#edit").on('click', function() {
    $("#name").focus();
    $(".fields").css("pointer-events","auto");
  });
});
