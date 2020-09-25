<template>
  <main>
    <div class="page_header element_to_stick">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
            <h1 style="margin-top: 0.5em;"></h1>
            <div class="form-group"></div>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-5">
            <div class="search_bar_list">
              <input type="text" class="form-control" v-model="search" placeholder="¿Qué estás buscando?">
              <input type="submit" @click="goToRestaurantFilters()" value="Buscar">
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
    </div>
    <!-- /page_header -->
    <div class="container margin_30_40">
      <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
          <div class="clearfix">
            <a class="btn_map mobile btn_filters" data-toggle="collapse" href="#collapseLocation" style="color: #444;padding: 8px 10px; margin-bottom: 15px">
              {{ $store.state.location.route }} <i class="icon_pin_alt"></i></a>
            <a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a>
          </div>
          <div class="collapse" id="collapseLocation" style="margin-bottom: 15px">
            <div class="row no-gutters custom-search-input">
              <div class="col-lg-4">
                <div class="form-group">
                  <vue-google-autocomplete id="map"
                                           :country="['sv']"
                                           :enable-geolocation="true"
                                           classname="form-control no_border_r"
                                           v-model="places"
                                           placeholder="¿Cuál es tu dirección o calle donde llevaremos?"
                                           v-on:placechanged="getAddressData">
                  </vue-google-autocomplete>
                  <i class="icon_search"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /Map -->
          <div class="filter_col isWeb">
            <div class="filter_type">
              <h4><a href="#" style="background-color: #f8f8f8;">Lugar</a></h4>
              <vue-google-autocomplete id="map"
                                       :country="['sv']"
                                       :enable-geolocation="true"
                                       classname="form-control no_border_r"
                                       v-model="places"
                                       placeholder="¿Cuál es tu dirección o calle donde llevaremos?"
                                       v-on:placechanged="getAddressData">
              </vue-google-autocomplete>
            </div>

          </div>
          <div class="filter_col vld-parent">
            <loading :active.sync="isLoadingCuisineTypes"
                     :is-full-page="false"></loading>
            <div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
            <div class="filter_type">
              <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorias</a></h4>
              <div class="collapse show" id="filter_1">
                <ul>
                  <li v-for="type in cuisineTypes" :key="type.id">
                    <label class="container_check">{{ type.name }}<small>{{ type.homechefs_count }}</small>
                      <input type="checkbox" :id="type.id" :value="type.id" v-model="selectedCuisineTypes">
                      <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
              <!-- /filter_type -->
            </div>
            <div class="buttons">
              <a href="#0" class="btn_1 full-width isWeb" @click="goToRestaurantFilters">Filtrar</a>
              <a href="#0" class="btn_1 full-width open_filters isMobile" @click="goToRestaurantFilters">Filtrar</a>
            </div>
          </div>
        </aside>

        <div class="col-lg-9 vld-parent">
          <loading :active.sync="isLoading"
                   :is-full-page="false"></loading>
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" v-for="chef in homeChefs" :key="chef.id">
              <div class="strip">
                <figure>
                  <!--<span class="ribbon off">-30%</span>-->
                  <img :src="chef.header_image" :data-src="chef.header_image" class="img-fluid lazy" alt="">
                  <a href="#" class="strip_info">
                    <small v-if="chef.cuisine_types && chef.cuisine_types.length > 0">{{ chef.cuisine_types[0].name }}</small>
                    <div class="item_title">
                      <h3>{{ chef.name }}</h3>
                      <small>{{ chef.address }}</small>
                    </div>
                  </a>
                </figure>
                <ul>
                  <li><span>Avg. Price 24$</span></li>
                  <li>
                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /strip grid -->
          </div>
          <!-- /row -->
          <div class="pagination_fg" v-if="pagination && pagination.last_page_url">
            <a href="#" @click="prevPage()">&laquo;</a>
            <template v-for="page in pagination.last_page">
              <a  @click="goToPage(page)" :class="pagination.current_page === page ? 'active' : ''" :key="page">{{ page }}</a>
            </template>
            <a href="#" @click="nextPage()">&raquo;</a>
          </div>
        </div>
        <!-- /col -->
      </div>
    </div>
    <!-- /container -->

  </main>
  <!-- /main -->
</template>
<script>
import 'theia-sticky-sidebar';
import VueGoogleAutocomplete from "vue-google-autocomplete";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  components: {
    VueGoogleAutocomplete,
    Loading
  },
  computed: {
    places: function (){
      return this.$store.state.location.route + ' ' + this.$store.state.location.locality;
    },
    searchParams: function (){
      console.log('searchParams');
      console.log(this.$store.state.location);
      return {
        "cuisine_types": this.selectedCuisineTypes,
        "homechef_name" : this.search, "page": this.selectedPage,
        "lat": this.$store.state.location.latitude,
        "lng": this.$store.state.location.longitude
      };
    },
    chefsUrl: function (){
      return "api/chefs";
    }
  },
  data: () => ({
    cuisineTypes: [],
    isLoading: false,
    homeChefs: [],
    search: '',
    selectedCuisineTypes: [],
    isLoadingCuisineTypes: false,
    pagination: null,
    selectedPage: 1,
  }),
  mounted() {
    this.search =  this.$route.query.search;
    let cuisineTypes = this.$route.query.cuisine_types;
    this.selectedCuisineTypes = [];
    if(cuisineTypes){
      if(Array.isArray(cuisineTypes)){
        cuisineTypes.forEach(element => this.selectedCuisineTypes.push(element));
      } else {
        this.selectedCuisineTypes.push(cuisineTypes);
      }
    }
    this.getCuisineTypes();
    this.getChefs();
    this.settings();
  },
  methods: {
    goToPage(page){
      this.selectedPage = page;
      this.getChefs();
    },
    nextPage(){
      if(this.selectedPage < this.pagination.last_page){
        this.selectedPage++;
        this.getChefs();
      }
    },
    prevPage(){
      if(this.selectedPage > 1){
        this.selectedPage--;
        this.getChefs();
      }
    },
    goToRestaurantFilters(){
      this.$router.replace({name: 'filterRestaurant', query: { search: this.search,  cuisine_types: this.selectedCuisineTypes}});
      this.getChefs();
    },
    // eslint-disable-next-line no-unused-vars
    getAddressData: function (addressData, placeResultData, id) {
      this.city = addressData;
      this.$store.commit('SET_LOCATION', addressData);
    },
    async getCuisineTypes() {
      this.isLoadingCuisineTypes = true;
      await this.$axios.get("/api/cuisine-types").then(res => {
        this.cuisineTypes = res.data;
        this.isLoadingCuisineTypes = false;
      })
    },
    async getChefs() {
      this.isLoading = true;
      await this.$axios.get(this.chefsUrl, {params: this.searchParams}).then(res =>{
        console.log(res.data);
        this.homeChefs = res.data.data;
        this.pagination = res.data;
        console.log(this.homeChefs);
        this.isLoading = false;
      });
    },
    settings() {
      // Sticky sidebar
      window.$('#sidebar_fixed').theiaStickySidebar({
        minWidth: 991,
        updateSidebarHeight: true,
        additionalMarginTop: 25
      });
      // Button show/hide map
      window.$(".btn_map").on("click", function () {
        var el = window.$(".btn_map_txt");
        el.text() == el.data("text-swap") ? el.text(el.data("text-original")) : el.text(el.data("text-swap"));
        window.$('html, body').animate({
          scrollTop: window.$("body").offset().top
        }, 600);
      });

      //Filters collapse
      var $headingFilters = window.$('.filter_type h4 a');
      $headingFilters.on('click', function () {
        window.$(this).toggleClass('opened');
      })
      $headingFilters.on('click', function () {
        window.$(this).toggleClass('closed');
      });

      //Filters on mobile
      window.$('a.open_filters').on("click", function () {
        window.$('.filter_col').toggleClass('show');
        window.$('main').toggleClass('freeze');
        window.$('.layer').toggleClass('layer-is-visible');
      });
    }
  }
}

</script>
<style scoped src="@/assets/listing.css">
/* Smartphones ----------- */
</style>
<style>
@media only screen and (min-width: 760px) {
  .isMobile { display: none !important; }
}
@media only screen and (max-width: 760px) {
  .isWeb { display: none !important; }
}
</style>