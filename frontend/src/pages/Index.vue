<template>
  <q-page >
    <div class="q-pa-md row justify-center">
      <q-input v-model="text" filled  :max-height="500" label="Bucar por nombre">
        <template v-slot:prepend>
          <q-icon name="search" />
        </template>
      </q-input>
    </div>
    <div class="q-pa-md row justify-center scrolling-wrapper">
      <q-chip v-for="category in categories"
              :key="category.id"
              class="card"
              :selected.sync="category.selected"
              :color="category.selected ? 'primary' : '' "
              :text-color="category.selected ? 'white' : ''"
              clickable @click="searchFor()">
        {{ category.name }}
      </q-chip>
    </div>
    <div class="q-pa-md row items-start q-gutter-sm justify-center">

      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 q-pa-md"  v-for="item in homeChefs"  :key="'homeChef_' + item.id">
        <q-card class="my-card">
          <q-img :src="item.header_image" />
          <q-separator />
          <q-card-section>
            <q-btn
              fab
              color="primary"
              icon="perm_identity"
              class="absolute"
              style="top: 0; right: 12px; transform: translateY(-50%);"
            />
            <div class="row no-wrap items-center">
              <div class="col text-h6 ellipsis">
                {{ item.name }}
              </div>
              <!--<div class="col-auto text-grey text-caption q-pt-md row no-wrap items-center">
                <q-icon name="place" />
                250 ft
              </div>-->
            </div>
          </q-card-section>
          <q-card-section class="q-pt-none">
            <div class="text-subtitle1" style="height: 40px; overflow:hidden;">
              <q-chip v-for="type in item.cuisine_types"
                      :key="item.id +'_'+ type.name"
                      class="card">
                {{ type.name }}
              </q-chip>
            </div>
            <div class="text-caption text-grey" style="height: 40px; overflow:hidden;">
              {{ item.description }}
              Lorem ipsum dolor sit amet, consectetur adipiscing elit
              Lorem ipsum dolor sit amet, consectetur adipiscing elit
              Lorem ipsum dolor sit amet, consectetur adipiscing elit

            </div>
          </q-card-section>
          <q-separator />
          <q-card-actions class="justify-center">
            <q-btn  @click="openWhatApp(item.mobile_phone)" round size="md" icon="fab fa-whatsapp" color="green"/>
            <q-btn v-if="item.facebook_url" @click="goToURL(item.facebook_url)" round size="md" icon="fab fa-facebook" color="blue-6"/>
            <q-btn  v-if="item.instagram_url" @click="goToURL(item.instagram_url)" round size="md" icon="fab fa-instagram" color="pink-5"/>

          </q-card-actions>
        </q-card>
      </div>
      <!--<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 q-pa-md"  v-for="index in 10"  :key="index">
        <q-card class="my-card">
          <q-img src="https://cdn.quasar.dev/img/chicken-salad.jpg" />
          <q-card-section>
            <q-btn
              fab
              color="primary"
              icon="place"
              class="absolute"
              style="top: 0; right: 12px; transform: translateY(-50%);"
            />
            <div class="row no-wrap items-center">
              <div class="col text-h6 ellipsis">
                Cafe Basilico
              </div>
              <div class="col-auto text-grey text-caption q-pt-md row no-wrap items-center">
                <q-icon name="place" />
                250 ft
              </div>
            </div>
            <q-rating v-model="stars" :max="5" size="32px" />
          </q-card-section>
          <q-card-section class="q-pt-none">
            <div class="text-subtitle1">
              $・Italian, Cafe
            </div>
            <div class="text-caption text-grey">
              Small plates, salads & sandwiches in an intimate setting.
            </div>
          </q-card-section>
          <q-separator />
          <q-card-actions>
            <q-btn flat round icon="event" />
            <q-btn flat color="primary">
              Reserve
            </q-btn>
          </q-card-actions>
        </q-card>
      </div>-->
    </div>
  </q-page>
</template>
<script>
export default {
  name: "PageIndex",
  data: () => ({
    categories: [],
    homeChefs: [],
    text: null,
    stars: 5
  }),
  methods: {
     async getCuisineTypes() {
       this.$store.dispatch("loadingShow");
       await this.$axios.get("/api/cuisine-types").then(res => {
        this.categories = res.data;
         this.$store.dispatch("loadingHide");
      })
    },
    searchFor() {
      console.log("searchFor");
    },
    openWhatApp(phoneNumber) {
      var text = "Hola! Quisiera recibir más información!";
      var uri = "https://wa.me/" + phoneNumber + "/?text=";
      var res = uri + encodeURI(text);
      window.open(res, "_blank");
    },
    goToURL(url) {
      window.open(url, "_blank");
    },
    async getChefs() {
      this.$store.dispatch("loadingShow");
      await this.$axios.get("/api/chefs").then(res =>{
        this.homeChefs = res.data.data;
        console.log(this.homeChefs);
        this.$store.dispatch("loadingHide");
      });
    }
  },
  async created() {
    this.getCuisineTypes();
    this.getChefs();
  }
}
</script>
<style>
.scrolling-wrapper {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  height: 90px;
}
.card {
  display: inline-block;
}

.my-card {
  max-width: 300px;
  margin: auto;
  width: 100%;
}


</style>
