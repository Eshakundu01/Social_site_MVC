$(function () {
  $("#upload").on("change", function() {
    $("#image").css("display", "none");
    $("#check").css("display","block");
  });

  $("#video").on("change", function() {
    $("#videofile").css("display", "none");
    $("#select").css("display","block");
  });
});
