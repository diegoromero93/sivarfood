<template>
  <div class="bg_gray vld-parent">
    <loading :active.sync="isLoading"
             :is-full-page="false"></loading>

    <div class="container margin_60_40">
      <div class="main_title center">
        <span><em></em></span>
        <h2>Categorías populares</h2>
        <p>Los mejores platillos, hechos por emprendedores salvadoreños</p>
      </div>
      <!-- /main_title -->
      <div class="owl-carousel owl-theme categories_carousel">
        <div class="item" v-for="type in cuisineTypes" :key="type.id">
          <router-link :to="{ name: 'filterRestaurant', query: { cuisine_types: type.id } }">
            <span>{{ type.homechefs_count }}</span>
            <i :class="type.favicon"></i>
            <h3> {{ type.name }}</h3>
            <small>{{ type.description }}</small>
          </router-link>
        </div>
      </div>
      <!-- /carousel -->
    </div>
    <!-- /container -->
  </div>
  <!-- /bg_gray -->
</template>
<script>
import $ from "jquery";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: "Categories",
  components: {
    Loading
  },
  data: () => ({
    cuisineTypes: [],
    isLoading: false
  }),
  async created() {
    await this.getCuisineTypes();
    this.$nextTick(function () {
      this.installOwlCarousel();
    }.bind(this));
  },
  methods:{
    installOwlCarousel() {
      // Rotate icons
      $(".categories_carousel .item a").hover(
          function () {
            $(this).find("i").toggleClass("rotate-x");
          }
      );
      // Carousel categories home page
      window.$('.categories_carousel').owlCarousel({
        center: false,
        items: 5,
        loop: false,
        margin: 20,
        dots: false,
        nav: true,
        lazyLoad: true,
        navText: ["<i class='arrow_carrot-left'></i>", "<i class='arrow_carrot-right'></i>"],
        responsive: {
          0: {
            nav: false,
            dots: true,
            items: 1
          },
          480: {
            nav: false,
            dots: true,
            items: 2
          },
          768: {
            nav: false,
            dots: true,
            items: 3
          },
          1025: {
            nav: false,
            dots: true,
            items: 4
          },
          1340: {
            nav: true,
            dots: false,
            items: 5
          }
        }
      });

    },
    async getCuisineTypes() {
      this.isLoading = true;
      await this.$axios.get("/api/cuisine-types").then(res => {
        this.cuisineTypes = res.data;
        this.isLoading = false;
      })
    },
  }
}
</script>