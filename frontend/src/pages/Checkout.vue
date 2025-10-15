<template>
  <div class="max-w-2xl mx-auto my-5">
    <div class="bg-white p-6 rounded-xl shadow-sm">
      <h3 class="text-2xl font-bold text-[#2d5a27] mb-6">Checkout</h3>
      <div v-if="store.cart.length===0">Your cart is empty.</div>
      <div v-else>
        <ul>
          <li v-for="(c, i) in store.cart" :key="i" style="margin-bottom:6px">{{ c.name }} - \${{ c.price }}</li>
        </ul>
        <div style="margin-top:12px">Total: <strong>\${{ total.toFixed(2) }}</strong></div>

        <form @submit.prevent="placeOrder" style="margin-top:12px">
          <input v-model="address" placeholder="Delivery Address" required/>
          <select v-model="payment">
            <option value="gcash">GCash</option>
            <option value="cod">Cash on Delivery</option>
          </select>
          <div style="display:flex;gap:8px;justify-content:flex-end;margin-top:12px">
            <button class="bg-[#2d5a27] hover:bg-[#367d2e] text-white px-4 py-2 rounded-lg transition" 
                    type="submit">Place Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useMainStore } from '../stores/mainStore'
const stores = useMainStore()
const address = ref('')
const payment = ref('gcash')

const total = computed(()=> stores.cart.reduce((a,b)=>a+b.price, 0))

function placeOrder(){
  if(stores.cart.length===0) return alert('Cart is empty')
  stores.addOrder({ product: [...stores.cart], status: 'Pending', payment: payment.value })
  alert('Order placed!')
  store.cart = []
}
</script>
