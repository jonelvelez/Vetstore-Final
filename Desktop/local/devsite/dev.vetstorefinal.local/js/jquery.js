$(document).ready(function(){

//Login Modal
$('#login').modal({
    backdrop: 'static',
    keyboard: false
})

//Date Picker
$( function() {
    $( "#datepicker" ).datepicker();
});
  
//Admin Sidebar
$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
        .parent()
        .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
      $(this)
        .parent()
        .addClass("active");
    }
});
  
  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });

//Healthcard Input tags Disabled

  $(window).load(function(){
    let inputs_tag = $(".healthcard-container input");
    let inputs = $(".healthcard-container input");

    for(i = 0; i <= inputs_tag.length; i++){

      if (!$(inputs[i]).val()) {
        $(inputs_tag[i]).attr('readonly', false);
      } else {
        $(inputs_tag[i]).attr('readonly', true);
        $(inputs_tag[i]).addClass('bg-light');
      }

    }
  });

  let inputs = $(".petcard-modal td input");
  
  Array.from(inputs).forEach((input) => {
    $(input).attr('readonly', true);

  });

  
});










