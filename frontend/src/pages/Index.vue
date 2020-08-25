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
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 q-pa-md"  v-for="index in 10"  :key="index">
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
      </div>
    </div>

  </q-page>
</template>
<script>
export default {
  name: "PageIndex",
  data: () => ({
    categories: [],
    text: null,
    stars: 5
  }),
  methods: {
    async getCuisineTypes() {
      console.log("getCuisineTypes");
      this.$q.loading.show()
      await this.$axios.get("/api/cuisine-types").then(res => {
        console.log(res)
        this.categories = res.data.data;
      })
      this.$q.loading.hide()
    },
    searchFor() {
      console.log("searchFor");
    }
  },
  created() {
    this.getCuisineTypes();
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
