<template>
  <q-layout view="hHh lpR fFf">
    <q-header elevated class="bg-white">
      <q-toolbar class="text-primary toolbar">
        <div class="col-1">
          <q-btn flat round dense icon="menu" />
        </div>
        <div class="col-4">
          <q-toolbar-title class="q-ml-sm">
            Sivar Food
          </q-toolbar-title>
        </div>
        <div class="col-7">
          <q-select
            class="float-right q-mr-md" outlined
            v-model="location"
            use-input
            input-debounce="700"
            label="Tu ubicación"
            :options="prediction"
            @filter="filterFn"
            @input="setLocation"
            clearable
            style="height: 50px; display: inline-block !important;">

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
        </div>

      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
    <footer class="bg-black text-white" style="height: 2em">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: SivarFood
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->
  </q-layout>
</template>

<script>

// Add google map script if not exist; if exist, return true
window.checkAndAttachMapScript = function (callback) {
  if (!!window.google) {  // If you're using vue cli, then directly checking
    // 'google' obj will throw an error at the time of transpiling.
    callback();
    return true;
  }
  window.mapApiInitialized = callback;
  let script = document.createElement('script');
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAAhMPsNxZF7QSgCv_2dt9PBzixFo5Bh_I&libraries=places';
  document.body.appendChild(script);
}

export default {
  mounted() {
    window.checkAndAttachMapScript(this.setCurrentPostion());
  },
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
        }
      });
    },
    setLocation(value){
      this.location = value;
      this.setGeometry();
    },
    setCurrentPostion() {
      navigator.geolocation.getCurrentPosition(
        position => {
          this.currentPostion = new google.maps.LatLng(position.coords.latitude , position.coords.longitude);
        },
        error => {
          this.currentPostion = null;
        },
      );
    }
  }
}
</script>

<style>
.toolbar {
  min-height: 80px;
}
/*
The div that holds all the lines
*/
.pac-container {
  color: #d9d9d9;
}

/*
class for each line of the result
*/
.pac-item {
  font-size: 12px;
  color: #d9d9d9;
  font-family: Arial, Helvetica, sans-serif;
}
.q-item:after {
  background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png);
}
.my-content{
  padding: 10px 15px;
  background: rgba(86,61,124,.15);
  border: 1px solid rgba(86,61,124,.2);
}

</style>
