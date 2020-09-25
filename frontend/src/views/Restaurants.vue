<template>
  <div class="container margin_60_40 vld-parent">
    <loading :active.sync="isLoading"
             :is-full-page="false"></loading>
    <div class="main_title">
      <span><em></em></span>
      <h2>Emprendedores trending</h2>
      <p>Los mejores emprendedores de todo sivar.</p>
      <router-link to="/about">Ver todos</router-link>
    </div>

    <div class="owl-carousel owl-theme carousel_4 ">
      <div class="item" v-for="chef in chefs" :key="chef.id">
        <div class="strip">
          <figure>
            <span class="ribbon off">-30%</span>
            <img :src="chef.header_image" style="width: 460px; height: 310px" :data-src="chef.header_image" class="owl-lazy" alt="">
            <a href="detail-restaurant.html" class="strip_info">
              <small v-if="chef.cuisine_types && chef.cuisine_types.length > 0">{{ chef.cuisine_types[0].name }}</small>
              <div class="item_title">
                <h3>{{ chef.name }}</h3>
                <small>{{ chef.address }}</small>
              </div>
            </a>
          </figure>
        </div>
      </div>
    </div>
    <!-- /carousel -->

    <div class="banner lazy" data-bg="assets/img/banner_bg_desktop.jpg">
      <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
        <div>
          <small>sivarfood</small>
          <h3>Más de  50 emprendedores</h3>
          <p>Agenda tu comida, al mejor precio y apoya local</p>
          <a href="grid-listing-filterscol.html" class="btn_1">Ver todos</a>
        </div>
      </div>
      <!-- /wrapper -->
    </div>
    <!-- /banner -->
    <p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View All</a></p>
    <!-- /button visibile on tablet/mobile only -->
  </div>
</template>
<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
  components: {
    Loading
  },
  data: () => ({
    chefs: [],
    isLoading: false
  }),
  async mounted() {
    await this.getChefs();
    this.$nextTick(function () {
      this.installOwlCarousel();
    }.bind(this));
  },
  methods: {
    async getChefs() {
      this.isLoading = true;
      await this.$axios.get("api/chefs").then(res =>{
        this.chefs = res.data.data
        console.log(this.chefs);
        this.isLoading = false;
      });
    },
    installOwlCarousel() {
      window.$('.carousel_4').owlCarousel({
        items: 4,
        loop: false,
        margin: 20,
        dots:false,
        lazyLoad:true,
        navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],
        nav:true,
        responsive: {
          0: {
            items: 1,
            nav: false,
            dots:true
          },
          560: {
            items: 2,
            nav: false,
            dots:true
          },
          768: {
            items: 2,
            nav: false,
            dots:true
          },
          991: {
            items: 3,
            nav: true,
            dots:false
          },
          1230: {
            items: 4,
            nav: true,
            dots:false
          }
        }
      });
    }
  }
}
</script>