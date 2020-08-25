<template>
  <q-layout view="hHh Lpr fFf"> <!-- Be sure to play with the Layout demo on docs -->

    <!-- (Optional) The Header -->
    <q-header elevated class="row justify-center">
      <q-toolbar class="col">
        <q-toolbar-title>
          Sivar Food
        </q-toolbar-title>
      </q-toolbar>
      <q-tabs>
        <q-route-tab
          icon="info"
          to="/your/route"
          replace
          label="Acerca de"
        />
        <q-route-tab
          icon="assignment"
          to="/some/other/route"
          replace
          label="Registrate"
        />
      </q-tabs>

    </q-header>


    <q-page-container>
      <!-- This is where pages get injected -->
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>
export default {
  // name: 'LayoutName',

  data () {
    return {
      leftDrawer: true
    }
  }
}
</script>
