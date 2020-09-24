import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";


Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        location: {},
        search: '',
    },
    mutations: {
        SET_LOCATION(state, location) {
            state.location = location;
        },
        SET_SEARCH(state, search) {
            state.search = search;
        },
    },
    actions: {},
    modules: {},
    plugins: [createPersistedState()]
});