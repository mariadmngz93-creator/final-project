import { defineStore } from 'pinia'

export const useMainStore = defineStore('main', {
  state: () => ({
    user: null,
    products: [
      {
        id: 1,
        name: 'Sample Product',
        price: 29.99,
        image: '/src/assets/product-placeholder.svg',
        sold: 0,
        qty: 10
      }
    ],
    cart: [],
    orders: []
  }),
  
  actions: {
    login(userData) {
      this.user = userData
    },
    logout() {
      this.user = null
      this.cart = []
    },
    addToCart(product) {
      this.cart.push(product)
    },
    addProduct(product) {
      this.products.push(product)
    },
    addOrder(order) {
      this.orders.push(order)
    }
  }
})
