import Vue from 'vue'
import axios from 'axios'
axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.withCredentials = true;
Vue.prototype.$axios = axios
Vue.config.productionTip = false;

