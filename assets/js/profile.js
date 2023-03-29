$(function () {
  $("#imageUpload").on('change', function(){
    readURL(this);
  });

  $("input[id='cover']").on('change', function(){
    readCover(this);
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result);
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function readCover(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#coverPreview').attr('src', e.target.result);
        $('#coverPreview').hide();
        $('#coverPreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
});
