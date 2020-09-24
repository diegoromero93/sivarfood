<template>
  <q-layout view="hHh lpR fFf">
    <q-header elevated class="bg-white">
      <q-toolbar class="text-primary q-ma-sm" style="flex-wrap: wrap">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  :style="($q.screen.lt.sm ||  $q.screen.lt.xs) ? 'min-height: 50px' : ''">
          <div class="col header-columns" > <q-btn flat round dense icon="menu" /></div>
          <div class="col header-columns"><q-toolbar-title class="q-ml-sm">
            Sivar Food
          </q-toolbar-title></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="col header-columns q-mr-sm" :class="($q.screen.lt.sm ||  $q.screen.lt.xs) ? 'float-left' : 'float-right q-mr-sm'">
            <location></location>
          </div>
        </div>
      </q-toolbar>
    </q-header>
    <q-page-container>
      <router-view />
    </q-page-container>
    <footer class="bg-black text-white" style="height: 2em">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: SivarFood
    </div>
    </footer>
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

import Location from "components/Location";

export default {
  components: {Location},
  mounted() {
    window.checkAndAttachMapScript(this.setCurrentPostion());
  },
  methods: {
    setCurrentPostion() {
    }
  }
}
</script>

<style>
.header-columns{
  display: inline-block;
  vertical-align: middle
}

</style>
