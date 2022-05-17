$(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").on('click', function () {
    if (this.checked) {
      checkbox.each(function () {
        this.checked = true;
      });
    } else {
      checkbox.each(function () {
        this.checked = false;
      });
    }
  });

  checkbox.on('click', function () {
    if (!this.checked) {
      $("#selectAll").prop("checked", false);
    }
  });

  $("ul.tab-bar > li > a").on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id;
  });

  var hash = window.location.hash;

  $("#managementSearch").on("submit", function () {
    $(hash).tab('show');
  })
});

$('.btn-user').on('click', function () {
  var post = $(this);
  var userId = post.attr('value');
  console.log(userId);
  $('.value-id').attr('value', userId);
});

$('.btn-course').on('click', function () {
  var post = $(this);
  var userId = post.attr('value');
  console.log(userId);
  $('.value-id').attr('value', userId);
});

$(".btn-approve").on('click', function(){
  var post = $(this);
  var courseId = $(this).val();
  $.ajax({
    method: "POST",
    url: "/admin/approve-course/" + courseId,
    data: $(this).val(),
    success : function(response){
        post.text(response);
        if (response == 'approved') {
            post.addClass('bg-gradient-success');
        } else {
            post.removeClass('bg-gradient-success');
        }
    }
  });
});

$(".check-notifications").on('click', function(){
  var post = $(this);
  var notificationId = $(this).attr('value');
  console.log(notificationId);
  $.ajax({
    method: "GET",
    url: "/admin/check-notification/" + notificationId,
    data: $(this).attr('value'),
    success : function(response){
      alert(response);
      $('#unreadNotification').text(response);
      post.removeClass('bg-warning');
      if (response == 0) {
        $('#navbarDropdown').removeClass('bg-danger');
      }
    },
    error : function(response){
      alert('huy');
      console.log(response);
    }
  });
});