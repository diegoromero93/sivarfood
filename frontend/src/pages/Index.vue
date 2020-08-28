<template>
  <q-page >
    <div class="q-pa-md row justify-center">
      <div class="col-4">
        <q-input v-model="homechefName" @keyup.enter="filter" filled  :max-height="500" label="Bucar por nombre">
          <template v-slot:prepend>
            <q-icon name="search" />
          </template>
        </q-input>
      </div>
    </div>
    <div class="q-pa-md row justify-center scrolling-wrapper">
      <q-chip v-for="type in cuisineTypes"
              :key="type.id"
              class="card"
              :selected.sync="type.selected"
              :color="type.selected ? 'primary' : '' "
              :text-color="type.selected ? 'white' : ''"
              clickable @click="filter">
        {{ type.name }}
      </q-chip>
    </div>
    <q-infinite-scroll @load="onLoad" ref="infiniteScroll" scroll-target="#home-chefs-container" :offset="500">
      <div class="q-pa-md row items-start q-gutter-sm justify-center">
        <div id="home-chefs-container" class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 q-pa-md caption"  v-for="item in homeChefs"  :key="'homeChef_' + item.id">
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
      </div>
      <template v-slot:loading>
        <div class="row justify-center q-my-md">
          <q-spinner-dots color="primary" size="40px" />
        </div>
      </template>
    </q-infinite-scroll>
  </q-page>
</template>
<script>
export default {
  name: "PageIndex",
  data: () => ({
    cuisineTypes: [],
    homeChefs: [],
    homechefName: null,
    text: null,
    stars: 5,
    pagination: {
      firstPage: true,
      nextPage: null
    }
  }),
  methods: {
     async getCuisineTypes() {
       this.$store.dispatch("loadingShow");
       await this.$axios.get("/api/cuisine-types").then(res => {
        this.cuisineTypes = res.data;
         this.$store.dispatch("loadingHide");
      })
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
      await this.$axios.get(this.chefsUrl, {params: this.searchParams}).then(res =>{
        this.pagination.firstPage = false;
        res.data.data.forEach(element => this.homeChefs.push(element));
        this.pagination.nextPage = res.data.next_page_url;
      });
    },
    filter(){
      this.homeChefs = [];
      this.pagination.firstPage = true;
      this.pagination.nextPage = null;
      this.$refs.infiniteScroll.reset();
      // for some reason timemout needed
      setTimeout(()=>{
        this.$refs.infiniteScroll.resume();
      }, 10);
    },
    async onLoad(index, done) {
       if(this.chefsUrl != null){
         await this.getChefs();
         done();
       } else {
         this.$refs.infiniteScroll.stop();
       }
    }
  },
  async created() {
    this.getCuisineTypes();
  },
  computed: {
    searchParams: function (){
      let selectedCuisineTypes = [];
      this.cuisineTypes.forEach(function (element){
        if(element.selected){
          selectedCuisineTypes.push(element.id);
        }
      })
      return {"cuisine_types": selectedCuisineTypes, "homechef_name" : this.homechefName};
    },
    chefsUrl: function (){
      return this.pagination.firstPage ? "api/chefs" : this.pagination.nextPage;
    }
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
