import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    auth: false
  },
  mutations: {
    SET_USER(state, user) {
      state.user = user;
      state.auth = Boolean(user);
    }
  },
  actions: {
    async login({ dispatch }, form) {
      await this._vm.$http.post("/login", form).then(response => {
        this.user = response.data;
      });
      dispatch("getUser");
    },
    async logout({ dispatch }) {
      await this._vm.$http.post("/logout");
      dispatch("getUser");
    },
    async getCSRFCookie() {
      await this._vm.$http.get("/sanctum/csrf-cookie");
    },
    getUser({ commit }) {
      this._vm.$http
        .get("/api/user")
        .then(res => {
          commit("SET_USER", res.data);
        })
        .catch(() => {
          commit("SET_USER", null);
        });
    }
  },
  modules: {}
});
