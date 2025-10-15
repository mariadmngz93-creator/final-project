<template>
  <nav class="bg-white shadow-sm">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-16">
        <router-link to="/" class="text-xl font-semibold text-forest-primary">
          Alastria
        </router-link>

        <div class="hidden md:block flex-1 max-w-md mx-8">
          <input
            type="search"
            placeholder="Search products..."
            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-forest-primary focus:ring-2 focus:ring-forest-primary/10 outline-none"
          />
        </div>

        <div class="flex items-center gap-4">
          <router-link
            to="/shop"
            class="text-gray-600 hover:text-forest-primary transition-colors"
          >
            Shop
          </router-link>

          <template v-if="user">
            <router-link
              v-if="user.type === 'seller'"
              to="/dashboard"
              class="text-gray-600 hover:text-forest-primary transition-colors"
            >
              Dashboard
            </router-link>
            <router-link
              v-else
              to="/orders"
              class="text-gray-600 hover:text-forest-primary transition-colors"
            >
              Orders
            </router-link>
            <button
              @click="logout"
              class="text-gray-600 hover:text-forest-primary transition-colors"
            >
              Logout
            </button>
          </template>

          <template v-else>
            <router-link
              to="/login"
              class="text-gray-600 hover:text-forest-primary transition-colors"
            >
              Login
            </router-link>
            <router-link
              to="/register"
              class="px-4 py-2 bg-forest-primary text-white rounded-lg hover:bg-forest-light transition-colors"
            >
              Register
            </router-link>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { computed } from 'vue'
// import { useUserStore } from '../stores/user'
import { useRouter } from 'vue-router'

const userStore = useUserStore()
const router = useRouter()
const user = computed(() => userStore.user)

function logout() {
  userStore.logout()
  router.push('/login')
}
</script>

<style scoped>
.navbar {
  background: white;
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  gap: 2rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.brand {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--accent1);
}

.search-wrap {
  flex: 1;
  max-width: 580px;
}

.search-wrap input {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.75rem;
  background: #f9fafb;
  transition: all 0.2s ease;
}

.search-wrap input:focus {
  background: white;
  border-color: var(--forest-primary);
  box-shadow: 0 0 0 3px rgba(45, 90, 39, 0.1);
  outline: none;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.nav-link {
  color: #4b5563;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.2s ease;
}

.nav-link:hover {
  color: var(--forest-primary);
}

.btn-primary {
  padding: 0.625rem 1rem;
  background: var(--forest-primary);
  color: white;
  border-radius: 0.75rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

.btn-primary:hover {
  background: var(--forest-light);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(45, 90, 39, 0.2);
}

.user-wrap {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.user-email {
  color: #6b7280;
  font-size: 0.875rem;
}
</style>
