import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import SellerDashboard from '../pages/SellerDashboard.vue'
import Orders from '../pages/Orders.vue'
import Checkout from '../pages/Checkout.vue'
import LandingPage from '../pages/LandingPage.vue'

const routes = [
  {
    path: '/',
    component: LandingPage
  },
  {
    path: '/home',
    component: Home
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/dashboard',
    component: SellerDashboard
  },
  {
    path: '/orders',
    component: Orders
  },
  {
    path: '/checkout',
    component: Checkout
  }
]

export default createRouter({
  history: createWebHistory(),
  routes
})
