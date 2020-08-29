import Vue from 'vue'
import axios from 'axios'

axios.defaults.baseURL = "http://api.sivarfood.siliconsivar.com";
axios.defaults.withCredentials = true;
Vue.prototype.$axios = axios
Vue.config.productionTip = false;

