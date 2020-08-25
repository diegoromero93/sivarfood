<template>
  <div id="q-app">
    <router-view />
  </div>
</template>
<script>
export default {
  name: 'App',
  created() {
    this.getCSRFCookie();
  },
  methods: {
    async getCSRFCookie() {
      await this.$store
        .dispatch("getCSRFCookie");
    }
  }
}
</script>
