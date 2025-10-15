<template>
  <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Seller Dashboard</h2>

    <div class="flex justify-between items-center mb-6">
      <div>Inventory ({{ store.products.length }})</div>
      <button @click="show = true" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg transition">
        Add Product
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <div v-for="p in store.products" :key="p.id" class="bg-white rounded-lg shadow-md overflow-hidden">
        <img :src="p.image" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h4 class="font-semibold text-lg mb-2">{{ p.name }}</h4>
          <div class="flex justify-between text-gray-600">
            <div>${{ p.price }}</div>
            <div>{{ p.qty || '-' }} qty</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div v-if="show" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
      <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <h3 class="text-xl font-semibold mb-4">Add Product</h3>
        <form @submit.prevent="addProduct" class="space-y-4">
          <input v-model="name" placeholder="Product name" required class="w-full p-2 border rounded" />
          <textarea v-model="desc" placeholder="Description" class="w-full p-2 border rounded"></textarea>
          <input v-model.number="price" type="number" placeholder="Price" required class="w-full p-2 border rounded" />
          <input v-model.number="qty" type="number" placeholder="Quantity" required class="w-full p-2 border rounded" />
          <input type="file" @change="onFile" class="w-full" />
          <div class="flex justify-end gap-2">
            <button type="button" @click="show=false" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Cancel</button>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useMainStore } from '../stores/mainStore'

const store = useMainStore() // ✅ fixed variable name
const show = ref(false)
const name = ref('')
const desc = ref('')
const price = ref(0)
const qty = ref(1)
const imageUrl = ref('/src/assets/product-placeholder.svg')

function onFile(e) {
  const f = e.target.files[0]
  if (f) imageUrl.value = URL.createObjectURL(f)
}

function addProduct() {
  store.addProduct({
    id: Date.now(),
    name: name.value,
    description: desc.value,
    price: price.value,
    qty: qty.value,
    image: imageUrl.value,
    sold: 0
  })
  show.value = false
  name.value = ''
  desc.value = ''
  price.value = 0
  qty.value = 1
  imageUrl.value = '/src/assets/product-placeholder.svg'
}
</script>
