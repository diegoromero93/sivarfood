<template>
  <div id="app">
    <header-component></header-component>
      <router-view></router-view>
    <!-- /main -->
    <footer-component></footer-component>
    <scroll-to-top></scroll-to-top>
    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
  </div>
</template>
<script>
import $ from 'jquery';
import 'owl.carousel';
import LazyLoad from "vanilla-lazyload";
import HeaderComponent from "@/components/Header";
import FooterComponent from "@/components/Footer"
import ScrollToTop from "@/components/ScrollToTop";

export default {
  name: 'App',
  components:{
    HeaderComponent,
    FooterComponent,
    ScrollToTop
  },
  mounted() {

    this.myLazyLoad = new LazyLoad({
      elements_selector: '.lazy',
      class_loaded: 'lazy-loaded',
      load_delay: 500,
      threshold: 100,
      callback_enter: function(el) {
        console.log(el.getAttribute("data-src"));
      }
    });

    // Header background
    $('.background-image').each(function(){
      $(this).css('background-image', $(this).attr('data-background'));
    });

    // Opacity mask
    $('.opacity-mask').each(function(){
      $(this).css('background-color', $(this).attr('data-opacity-mask'));
    });

  }
}
</script>

<style>
</style>
