import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    auth: false,
    loading: 0,
    location: {
      lat: 1234,
      lng: 1234
    },
  },
  mutations: {
    SET_USER(state, user) {
      state.user = user;
      state.auth = Boolean(user);
    },
    SET_LOCATION(state, location) {
      state.location = location;
    },
  },
  actions: {
    async login({ dispatch }, form) {
      await this._vm.$axios.post("/login", form).then(response => {
        this.user = response.data;
      });
      dispatch("getUser");
    },
    async logout({ dispatch }) {
      await this._vm.$axios.post("/logout");
      dispatch("getUser");
    },
    async getCSRFCookie() {
      await this._vm.$axios.get("/sanctum/csrf-cookie");
    },
    getUser({ commit }) {
      this._vm.$axios
        .get("/api/user")
        .then(res => {
          commit("SET_USER", res.data);
        })
        .catch(() => {
          commit("SET_USER", null);
        });
    },
    loadingShow(){
      this._vm.$q.loading.show();
      if(isNaN(this.loading)){
        this.loading = 0;
      }
      this.loading++;
    },
    loadingHide(){
      this.loading--;
      if(this.loading <= 0) {
        this.loading = 0;
        this._vm.$q.loading.hide();
      }
    }
  },
  modules: {}
});
