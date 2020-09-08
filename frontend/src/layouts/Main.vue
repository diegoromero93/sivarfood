<template>
  <q-layout view="hHh lpR fFf">
    <q-header elevated class="bg-white">
      <q-toolbar class="text-primary toolbar">
        <div class="col-1">
          <q-btn flat round dense icon="menu" />
        </div>
        <div class="col-4">
          <q-toolbar-title>
            Sivar Food
          </q-toolbar-title>
        </div>
        <div class="col-7">
          <q-select
            class="float-right mr-5"
            v-model="model"
            use-input
            input-debounce="0"
            label="Tu ubicación"
            :options="options"
            @filter="filterFn"
            style="width: 200px; height: 50px"
            behavior="menu">
            <template v-slot:prepend>
              <q-icon name="place" />
            </template>
            <template v-slot:no-option>
              <q-item>
                <q-item-section class="text-grey">
                  No results
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
const stringOptions = [
  'Google', 'Facebook', 'Twitter', 'Apple', 'Oracle'
]
export default {
  data () {
    return {
      model: null,
      stringOptions,
      options: stringOptions
    }
  },
  methods: {
    filterFn (val, update) {
      if (val === '') {
        update(() => {
          this.options = stringOptions
        })
        return
      }
      update(() => {
        const needle = val.toLowerCase()
        this.options = stringOptions.filter(v => v.toLowerCase().indexOf(needle) > -1)
      })
    }
  }
}
</script>
<style>
.toolbar {
  min-height: 80px;
}
</style>
