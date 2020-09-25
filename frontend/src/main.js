import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import createStore from './store'


Vue.config.productionTip = false;
//axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.baseURL = "https://api.sivarfood.siliconsivar.com/";
axios.defaults.withCredentials = true;
Vue.prototype.$axios = axios;


Vue.use(VueAxios, axios);
Vue.use(createStore);
Vue.prototype.$store = createStore;


new Vue({
  router,
  createStore,
  render: h => h(App)
}).$mount('#app')
