<template>
  <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 overflow-hidden p-4">
    <img :src="product.image" alt="product" class="w-full h-36 object-contain bg-gray-50 rounded-lg p-3" />
    <h4 class="font-semibold text-lg mt-3">{{ product.name }}</h4>
    <div class="flex justify-between text-gray-600 text-sm my-2">
      <div>${{ product.price.toFixed(2) }}</div>
      <div>{{ product.sold }} sold</div>
    </div>
    <div class="flex gap-2 mt-3">
      <button @click="$emit('view', product)"
              class="flex-1 px-3 py-2 rounded-lg border border-gray-200 hover:border-forest-primary hover:text-forest-primary font-medium transition">
        View
      </button>
      <button @click="$emit('add', product)"
              class="flex-1 px-3 py-2 rounded-lg bg-forest-primary hover:bg-forest-light text-white font-medium transition">
        Add to Cart
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({ product: Object })
</script>
