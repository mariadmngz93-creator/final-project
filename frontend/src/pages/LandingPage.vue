<template>
  <section class="page-enter">
    <div class="hero">
      <div class="left">
        <h1>Welcome to Alastria Marketplace</h1>
        <p>Shop Smart. Sell Fast. A modern marketplace for small businesses and savvy buyers.</p>
        <div style="margin-top:18px;display:flex;gap:12px">
          <!-- <router-link to="/home" class="btn">Start Shopping</router-link> -->
          <!-- <router-link to="/register" class="btn btn-ghost">Sell with Us</router-link> -->
        </div>
      </div>
      <div class="right" style="width:360px">
        <img
          src="/src/assets/product-placeholder.svg"
          style="width:100%;border-radius:12px;box-shadow:0 12px 30px rgba(11,13,25,0.08)"
        />
      </div>
    </div>

    <h3 style="margin-top:18px">Top Picks</h3>
    <div class="grid">
      <ProductCard v-for="p in products" :key="p.id" :product="p" @add="addToCart" />
    </div>
  </section>
</template>

<script setup>
import ProductCard from '../components/ProductCard.vue'
import { useMainStore } from '../stores/mainStore'
import { useRouter } from 'vue-router'
import Swal from 'sweetalert2'

const router = useRouter()
const stores = useMainStore()
const products = stores.products

async function addToCart(p){
  if(!stores.user) {
    await Swal.fire({
      title: 'Login Required',
      text: 'Please login or register to add items to cart',
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Login',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        router.push('/login')
      }
    })
    return
  }
  stores.addToCart(p)
  Swal.fire({
    title: 'Success!',
    text: 'Item added to cart',
    icon: 'success',
    timer: 1500,
    showConfirmButton: false
  })
}
</script>

<style scoped>
.page-enter {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s ease forwards;
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
