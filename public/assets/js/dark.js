$(function() {
  if (localStorage.getItem("mode") == "dark-theme") {
    $("body").addClass("dark");
  } else {
    $("body").removeClass("dark");
  }

  $("#mode").on("click", function() {
    if ($("body").hasClass("dark")) {
      $("body").removeClass("dark");
      localStorage.setItem("mode", "light-theme");
    } else {
      $("body").addClass("dark");
      localStorage.setItem("mode", "dark-theme");
    }
  });

  if (localStorage.getItem("mode") == "dark-theme") {
    $("body").addClass("dark");
  } else {
    $("body").removeClass("dark");
  }

  $("#theme").on("click", function() {
    if ($("body").hasClass("dark")) {
      $("body").removeClass("dark");
      localStorage.setItem("mode", "light-theme");
    } else {
      $("body").addClass("dark");
      localStorage.setItem("mode", "dark-theme");
    }
  });
});
