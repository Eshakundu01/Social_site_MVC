$(function() {
  var time = new Date();
  time.setDate(time.getDate()+3);

  $("#accept").on("click", function() {
    $(".cookie-wrapper").hide();
    Cookies.set("cookies_consent",1,{expires: time});
  });

  $("#decline").on("click", function(){
    $(".cookie-wrapper").hide();
  });
});
