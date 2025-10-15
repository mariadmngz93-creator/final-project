<template>
  <div class="transform opacity-0 translate-y-4 animate-fadeIn">
    <div class="flex gap-4 items-center mb-6">
      <input v-model="search" placeholder="Search products..." class="flex-1 p-2 border rounded-lg" />
      <select v-model="sort" class="w-44 p-2 border rounded-lg">
        <option value="name">Name</option>
        <option value="price_low">Price: Low to High</option>
        <option value="price_high">Price: High to Low</option>
        <option value="top_sales">Top Sales</option>
      </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <ProductCard v-for="p in filtered" :key="p.id" :product="p" @add="addToCart" />
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import ProductCard from '../components/ProductCard.vue'
import { useMainStore } from '../stores/mainStore'
import Swal from 'sweetalert2'

const stores = useMainStore()
const search = ref('')
const sort = ref('name')

const filtered = computed(() => {
  let list = stores.products.filter(p => p.name.toLowerCase().includes(search.value.toLowerCase()))
  if (sort.value === 'price_low') list.sort((a, b) => a.price - b.price)
  if (sort.value === 'price_high') list.sort((a, b) => b.price - a.price)
  if (sort.value === 'top_sales') list.sort((a, b) => b.sold - a.sold)
  return list
})

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
