import Vue from "vue"
import VueRouter from "vue-router"
import Home from "../views/Home.vue"
import About from "@/views/About"
import FilterRestaurants from "@/views/FilterRestaurant"
import DetailRestaurant from "@/views/DetailRestaurant"

Vue.use(VueRouter)

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/about",
    name: "about",
    component: About,
  },
  {
    path: "/filter-restaurant",
    name: "filterRestaurant",
    component: FilterRestaurants,
  },
  {
    path: "/detail-restaurant",
    name: "detailRestaurant",
    component: DetailRestaurant,
  },
  {path: '*', component: About}
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router