<template>
  <div class="flex items-center justify-center min-h-[90vh] bg-gray-50 px-4 py-10">
    <div class="flex items-center gap-10 max-w-4xl w-full flex-wrap justify-center">
      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full animate-fade-in">
        <div class="text-center mb-6">
          <h2 class="text-2xl font-bold text-gray-900">Create Account</h2>
        </div>

        <form @submit.prevent="registerUser" class="flex flex-col gap-4">
          <input v-model="email" type="email" placeholder="Email" required 
                 class="w-full p-3 rounded-xl border border-gray-200 bg-gray-50 focus:border-forest-primary focus:ring-2 focus:ring-forest-primary/10 outline-none transition" />
          <input v-model="password" type="password" placeholder="Password" required
                 class="w-full p-3 rounded-xl border border-gray-200 bg-gray-50 focus:border-forest-primary focus:ring-2 focus:ring-forest-primary/10 outline-none transition" />
          <input v-model="confirm" type="password" placeholder="Confirm password" required
                 class="w-full p-3 rounded-xl border border-gray-200 bg-gray-50 focus:border-forest-primary focus:ring-2 focus:ring-forest-primary/10 outline-none transition" />
          <select v-model="type" required
                  class="w-full p-3 rounded-xl border border-gray-200 bg-gray-50 focus:border-forest-primary focus:ring-2 focus:ring-forest-primary/10 outline-none transition">
            <option disabled value="">Select account type</option>
            <option value="buyer">Buyer</option>
            <option value="seller">Seller</option>
          </select>

          <div class="flex justify-between items-center mt-2 gap-4">
            <router-link to="/login" 
                        class="px-4 py-2.5 rounded-xl border border-gray-200 hover:border-forest-primary hover:text-forest-primary font-semibold transition hover:-translate-y-0.5">
              Already have an account?
            </router-link>
            <button type="submit"
                    class="px-4 py-2.5 rounded-xl bg-forest-primary hover:bg-forest-light text-white font-semibold transition hover:-translate-y-0.5 hover:shadow-lg hover:shadow-forest-primary/20">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useMainStore } from '../stores/mainStore'

const router = useRouter()
const stores = useMainStore()

const email = ref('')
const password = ref('')
const confirm = ref('')
const type = ref('')

function registerUser() {
  if (password.value !== confirm.value) {
    alert('Passwords do not match!')
    return
  }
  stores.login({ email: email.value, type: type.value })
  router.push('/home')
}
</script>