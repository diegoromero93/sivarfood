<template>
  <div>
    <p>{{ $store.state.user }}</p>
    <button @click="logout">Logout</button>
    <form @submit.prevent="login">
      <input v-model="form.email" type="text" /> <br />
      <input v-model="form.password" type="password" /> <br />
      <button>Login</button>
    </form>
  </div>
</template>
<script>
export default {
  data: () => ({
    form: {
      email: "me@diegoromero.com",
      password: "123456"
    }
  }),
  methods: {
    async login() {
      await this.$store.dispatch("login", this.form);
    },
    async logout() {
      await this.$store.dispatch("logout");
    }
  }
};
</script>
