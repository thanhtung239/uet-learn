$(function () {
  if ($('#uploadAvatarForm input').hasClass('is-invalid')) {
    $('#uploadAvatarModal').modal('show');
  }
});

$('#addTag').on('click', function() {
  if (!$('#selectTag').hasClass('d-none')) {
    $('#selectTag').addClass('d-none');
  } else {
    $('#selectTag').removeClass('d-none');
    if ($('#selectTag').on('change', function() {
      $('#summitTag').removeClass('d-none');
      $('#addTag').addClass('d-none');
    }));
  }
});