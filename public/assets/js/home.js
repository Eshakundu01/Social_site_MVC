$(function () {
  $("#upload").on("change", function() {
    $("#image").css("display", "none");
    $("#check").css("display","block");
  });

  $("#video").on("change", function() {
    $("#videofile").css("display", "none");
    $("#select").css("display","block");
  });

  $(".album").slice(0,10).show();

  $("#load").on("click", function() {
    $(".album:hidden").slice(0,10).show();

    if ($(".album:hidden").length == 0) {
      $("#load").fadeOut();
    }
  });
});
