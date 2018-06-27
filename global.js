$(document).ready(function(){

  // prevent click on top menu-item(working) and scroll to anchor
  //var item = "#menu-item-";

  $("#menu-item-215 a, #menu-item-199 a, #menu-item-222 a").click(function(e){
    e.preventDefault();

    $('#menu-item-215').click(function(){
      $('html, body').animate({
        scrollTop: $(".about").offset().top
      }, 2000);
    });

    $('#menu-item-199').click(function(){
      $('html, body').animate({
        scrollTop: $(".news").offset().top
      }, 2000);
    });

    $('#menu-item-222').click(function(){
      $('html, body').animate({
        scrollTop: $(".code").offset().top
      }, 2000);
    });

  });

  // hook second menu to top
    var nav = $('.scnd_nav');

    $(window).scroll(function(){
      if($(this).scrollTop() > 136){
        nav.addClass("f-nav");
      } else {
        nav.removeClass("f-nav");
      }
    });

  // make image bigger

  $(function() {
    var hov = "scnd_nav_blocks_hover";

    $(".scnd_nav_blocks ul li").hover(function() {
      $(this).addClass(hov);
    }, function(){
      $(this).removeClass(hov);
    });
  });

});
