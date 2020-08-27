<template>
  <q-page>
    <div class="q-pa-md">
      {{ $store.user }}
      <div class="q-pa-md row justify-center">
        <div class="col-4">
          <q-input
            filled
            v-model="form.email"
            label="Username"
            lazy-rules
            :rules="[ val => val && val.length > 0 || 'Please type something']"
          />
        </div>
      </div>
      <div class="q-pa-md row justify-center">
        <div class="col-4">
          <q-input v-model="form.password" label="Password" filled
                   :type="isPwd ? 'password' : 'text'"
                   lazy-rules
                   :rules="[ val => val && val.length > 0 || 'Please type something']">
            <template v-slot:append>
              <q-icon
                :name="isPwd ? 'visibility_off' : 'visibility'"
                class="cursor-pointer"
                @click="isPwd = !isPwd"
              />
            </template>
          </q-input>
        </div>
      </div>
      <div class="q-pa-md row justify-center">
        <div class="col-4  text-center">
          <q-btn color="primary" label="Login" @click="login"/>
        </div>
      </div>
    </div>
  </q-page>
</template>
<script>
export default {
  data () {
    return {
      form: {
        email: "diego.rene.romero@gmail.com",
        password: "123456",
      },
      isPwd: true,
      accept: false
    }
  },
  methods: {
    login() {
      this.$store.dispatch("loadingShow");
      this.$store.dispatch("login", this.form);
      this.$store.dispatch("loadingHide");
      console.log("login");
    }
  }
}
</script>

