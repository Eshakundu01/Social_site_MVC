$(function() {
  if (localStorage.getItem("mode") == "dark-theme") {
    $(".content").addClass("dark");
    $("#menu").addClass("dark");
    $(".modal-content").addClass("dark");
    $("#mode").toggleClass("active");
  } else {
    $(".content").removeClass("dark");
    $("#menu").removeClass("dark");
    $(".modal-content").removeClass("dark");
    $("#mode").toggleClass("active");
  }

  $("#mode").on("click", function() {
    if ($(".content").hasClass("dark")) {
      $(".content").removeClass("dark");
      $("#menu").removeClass("dark");
      $(".modal-content").removeClass("dark");
      localStorage.setItem("mode", "light-theme");
    } else {
      $(".content").addClass("dark");
      $("#menu").addClass("dark");
      $(".modal-content").addClass("dark");
      localStorage.setItem("mode", "dark-theme");
    }
  });

  if (localStorage.getItem("mode") == "dark-theme") {
    $(".navbar").addClass("dark");
    $(".dropdown-menu").addClass("dark");
    $(".greetbox").addClass("dark");
    $(".box").addClass("dark");
    $(".fields").addClass("dark");
    $(".detailsbox").addClass("dark");
    $(".foot").addClass("dark");
  } else {
    $(".navbar").removeClass("dark");
    $(".dropdown-menu").removeClass("dark");
    $(".greetbox").removeClass("dark");
    $(".box").removeClass("dark");
    $(".fields").removeClass("dark");
    $(".detailsbox").removeClass("dark");
    $(".foot").removeClass("dark");
  }

  $("#theme").on("click", function() {
    if ($(".navbar").hasClass("dark")) {
      $(".navbar").removeClass("dark");
      $(".dropdown-menu").removeClass("dark");
      $(".greetbox").removeClass("dark");
      $(".box").removeClass("dark");
      $(".fields").removeClass("dark");
      $(".detailsbox").removeClass("dark");
      $(".foot").removeClass("dark");
      localStorage.setItem("mode", "light-theme");
    } else {
      $(".navbar").addClass("dark");
      $(".dropdown-menu").addClass("dark");
      $(".greetbox").addClass("dark");
      $(".box").addClass("dark");
      $(".fields").addClass("dark");
      $(".detailsbox").addClass("dark");
      $(".foot").addClass("dark");
      localStorage.setItem("mode", "dark-theme");
    }
  });
});
