<template>
  <q-select
     outlined
    v-model="location"
    use-input
    input-debounce="700"
    label="Tu ubicación"
    :options="prediction"
    @filter="filterFn"
    @input="setLocation"
    clearable
    style="height: 50px;text-overflow: fade;">
    <template v-slot:selected>
      <span v-if="location" class="text-weight-bold"> {{ location.structured_formatting.main_text }}</span>
      <span v-else> {{ '' }}</span>
    </template>
    <template v-slot:option="scope">
      <q-item
        v-bind="scope.itemProps"
        v-on="scope.itemEvents">
        <q-item-section avatar>
          <q-icon name="place" />
        </q-item-section>
        <q-item-section>
          <q-item-label v-html="scope.opt.structured_formatting.main_text" />
          <q-item-label caption>{{ scope.opt.structured_formatting.secondary_text }}</q-item-label>
        </q-item-section>
      </q-item>
    </template>
    <template v-slot:prepend>
      <q-icon name="place" class="text-primary"/>
    </template>
    <template v-slot:no-option>
      <q-item>
        <q-item-section class="text-grey">
          Sin resultados
        </q-item-section>
      </q-item>
    </template>
  </q-select>
</template>
<script>


export default {
  data () {
    return {
      place: null,
      location: null,
      text: null,
      prediction: [],
      geometry: null,
      currentPostion: null
    }
  },
  methods: {
    async filterFn (val, update) {
      if (val === '') {
        this.options = []
      }
      else {
        setTimeout(() => {
          update(() => {
            this.setPredictions(val);
          })
        }, 30);
      }
    },
    async setPredictions(val) {
      let service = new google.maps.places.AutocompleteService();
      if (val !== '') {
        const that = this;
        await service.getPlacePredictions({ input: val, types: ['geocode', 'establishment'], language: "es-419",
            componentRestrictions:{ country: 'sv' }, origin: this.currentPostion } ,
          function (predictions, status) {
            if (google.maps.places.PlacesServiceStatus.OK === status) {
              that.prediction = predictions;
            }
          }
        );
      }
    },
    async setGeometry(){
      if(this.location === null) return;
      let request = {
        placeId: this.location.place_id,
        fields: ['geometry']
      };
      const that = this;
      let service = new google.maps.places.PlacesService(document.createElement('div'));
      await service.getDetails(request, (place, status) => {
        if (google.maps.places.PlacesServiceStatus.OK === status) {
          that.geometry = place.geometry;
          that.$store.commit('SET_LOCATION', place.geometry);
        }
      });
    },
    setLocation(value){
      this.location = value;
      this.setGeometry();
    }
  }
}
</script>
