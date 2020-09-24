<template>
  <div id="toTop"></div><!-- Back to top button -->
</template>
<script>
import $ from "jquery";

export default {
  mounted() {
    // Scroll to top
    var pxShow = 800; // height on which the button will show
    var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.
    $(window).scroll(function(){
      if($(window).scrollTop() >= pxShow){
        $("#toTop").addClass('visible');
      } else {
        $("#toTop").removeClass('visible');
      }
    });
    $('#toTop').on('click', function(){
      $('html, body').animate({scrollTop:0}, scrollSpeed);
      return false;
    });

    // Scroll to position
    $('a[href^="#"].btn_scroll').on('click', function (e) {
      e.preventDefault();
      var target = this.hash;
      var $target = $(target);
      $('html, body').stop().animate({
        'scrollTop': $target.offset().top
      }, 800, 'swing', function () {
        window.location.hash = target;
      });
    });
  }
}
</script>