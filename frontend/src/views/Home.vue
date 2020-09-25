<template>
  <main>
    <div class="hero_single version_2">
      <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-8">
              <p>De los mejores emprendedores de Sivar</p>
              <div class="row no-gutters custom-search-input">
                <div class="col-lg-4">
                  <div class="form-group">
                    <input class="form-control" v-model="search" type="text" placeholder="¿Qué estás buscando?">
                    <i class="icon_search"></i>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <vue-google-autocomplete id="map"
                                             :country="['sv']"
                                             :enable-geolocation="true"
                                             classname="form-control no_border_r"
                                             placeholder="¿Cuál es tu dirección o calle donde llevaremos?"
                                             v-on:placechanged="getAddressData"></vue-google-autocomplete>
                    <i class="icon_pin_alt"></i>
                  </div>
                </div>
                <div class="col-lg-2">
                  <input type="submit" value="Buscar" @click="goToRestaurantFilters()"/>
                </div>
              </div>
              <!-- /row -->
            </div>
          </div>
          <!-- /row -->
        </div>
      </div>
    </div>
    <!-- /hero_single -->
    <categories></categories>
    <!-- /categories -->

    <restaurants></restaurants>
    <!-- /restaurants -->

    <div class="call_section lazy" data-bg="assets/img/bg_call_section.jpg">
      <div class="container clearfix">
        <div class="col-lg-5 col-md-6 float-right wow">
          <div class="box_1">
            <h3>¿Eres un emprendedor, amante de la cocina?</h3>
            <p>¡Unete a la nueva revolución, cocina desde tu casa y vende a tus alrededores!</p>
            <a href="submit-restaurant.html" class="btn_1">Más información</a>
          </div>
        </div>
      </div>
    </div>
    <!--/call_section-->

  </main>
</template>

<script>
import Categories from "@/views/Categories";
import Restaurants from "@/views/Restaurants";
import VueGoogleAutocomplete from "vue-google-autocomplete";

export default {
  name: 'Home',
  components: {
    Categories,
    Restaurants,
    VueGoogleAutocomplete
  },
  data: () => ({
    city: '',
    search: ''
  }),
  mounted() {
  },
  methods: {
    // eslint-disable-next-line no-unused-vars
    getAddressData: function (addressData, placeResultData, id) {
      this.city = addressData;
      this.$store.commit('SET_LOCATION', addressData);
    },
    goToRestaurantFilters(){
      this.$router.push({name: 'filterRestaurant', query: { search: this.search }});
    }
  }
}
</script>
