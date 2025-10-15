<template>
  <div>
    <h2 class="text-[#2d5a27] font-bold text-2xl mb-6">Orders</h2>
    
    <div v-if="store.orders.length === 0" class="p-5 bg-neutral-50 rounded-xl">
      No orders yet.
    </div>

    <div v-else class="mt-4 space-y-4">
      <div v-for="(o, i) in store.orders" :key="i" 
           class="p-4 bg-white rounded-xl shadow-sm border border-neutral-200">
        <div class="flex justify-between items-center">
          <div>{{ o.product.map(p => p.name).join(', ') }}</div>
          <div class="text-neutral-600">{{ o.status }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useMainStore } from '../stores/mainStore'

const store = useMainStore() // ✅ fixed variable name
</script>
