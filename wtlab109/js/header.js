$(document).ready(function(){
  
  $("#user_profile").click(function(){
    $(".ez-sidebar").toggleClass("active");
    $("#user_name").toggleClass("active");
  });

  $("#menu_toggle").click(function(){
    $(".ez-sidebar").toggleClass("hide");
  });

  //toggle menu
  $(".ez-menu-control").click(function(){
    var target = $(this).attr("control-target");
    $("#" + target).toggleClass("menu-active");
    var menuItems = $("#" + target).children("li");
    //animate menu
    menuItems.each(function(index, link){
      link.style.animation = `menuItemsFade 0.3s ease forwards ${index/7}s`;
    });
  });
})
