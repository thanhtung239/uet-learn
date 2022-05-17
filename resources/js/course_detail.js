$(function () {
  $('#joinThisCourseButton').on('click', function (event) {
    if ($('#headerLoginRegister').innerWidth() > 0) {
      event.preventDefault();
      $('#loginRegisterModal').modal('show');
      $('#loginNavTab').trigger('click');
    }
  })
  
  if ($("#courseImage").length != 0) {
    var courseImage = document.getElementById("courseImage");
  
    courseImage.onchange = evt => {
      const [file] = courseImage.files
      if (file) {
        uploadImg.src = URL.createObjectURL(file)
      }
    }
  }
  
  if ($("#lessonImage").length != 0) {
    var lessonImage = document.getElementById("lessonImage");
  
    lessonImage.onchange = evt => {
      const [file] = lessonImage.files
      if (file) {
        uploadImg.src = URL.createObjectURL(file)
      }
    }
  }
});
