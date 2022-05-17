$(function () {
  $('.select-2').select2();
  
  $('.select-2-multiple').select2({
    tags: true,
    tokenSeparators: [',', ' '],
  });

  $('#resetFilter').on('click', function () {
    $('.get-value').val('');
    $('#newestOldestRadio #radioNewest').prop('checked', false);
    $('#newestOldestRadio #radioOldest').prop('checked', false);
    $('.input-change').trigger('change');
  });
});
