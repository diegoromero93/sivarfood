<template>
  <header :class="cssClass">
    <div class="container">
      <div id="logo">
        <a href="index.html">
          <img v-if="home"  src="assets/img/logo.svg" width="140" height="35" alt="" class="logo_normal">
          <img src="assets/img/logo_sticky.svg" width="140" height="35" alt="" class="logo_sticky">
        </a>
      </div>

      <!--<ul id="top_menu">
        <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
        <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
      </ul>-->
      <!-- /top_menu -->
      <a href="#0" class="open_close">
        <i class="icon_menu"></i><span>Menu</span>
      </a>
      <nav class="main-menu">
        <div id="header_menu">
          <a href="#0" class="open_close">
            <i class="icon_close"></i><span>Menu</span>
          </a>
          <a href="index.html"><img src="assets/img/logo.svg" width="140" height="35" alt=""></a>
        </div>
        <ul>
          <li class="submenu">
            <a href="#0" class="show-submenu">Home</a>
            <ul>
              <li><a href="index.html">Default</a></li>
              <li><a href="index-2.html">Video Background</a></li>
              <li><a href="index-3.html">Slider</a></li>
              <li><a href="index-5.html">Address Autocomplete</a></li>
              <li><a href="index-6.html">Search Version 2</a></li>
              <li><a href="index-7.html">Delivery/Takeaway version</a></li>
              <li><a href="modal-advertise.html">Modal Advertise</a></li>
              <li><a href="modal-newsletter.html">Modal Newsletter</a></li>
              <li><a href="index-4.html">GDPR Cookie Bar EU Law</a></li>
            </ul>
          </li>
          <li><a href="submit-restaurant.html">Submit</a></li>
          <li><a href="#0">Buy this template</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- /header -->
</template>

<script>
import $ from 'jquery';

export default {
  name: 'App',
  mounted() {
    // Sticky nav
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 1) {
        $('.element_to_stick').addClass("sticky");
      } else {
        $('.element_to_stick').removeClass("sticky");
      }
    });
    $(window).scroll();

    // Menu
    $('a.open_close').on("click", function () {
      $('.main-menu').toggleClass('show');
      $('.layer').toggleClass('layer-is-visible');
    });
    $('a.show-submenu').on("click", function () {
      $(this).next().toggleClass("show_normal");
    });
  },
  computed: {
    cssClass: function() {
      return  this.$route.fullPath === "/" ? "header clearfix element_to_stick" : "header_in clearfix";
    },
    home: function() {
      return  this.$route.fullPath === "/";
    }
  }
}
</script>