<template>
  <div class="min-h-screen bg-gray-50">
    <!-- ✨ Navbar with fade-in -->
    <transition name="fade-soft" appear>
      <Navbar class="animate-fade-in" />
    </transition>

    <main class="container mx-auto px-4 py-8">
      <!-- ✨ Route transitions with dynamic animation -->
      <router-view v-slot="{ Component }">
        <transition name="page" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
    </main>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import Navbar from './components/Navbar.vue'
import FooterComp from './components/Footer.vue'

const route = useRoute()

// 🎨 Assign custom animation based on route
const transitionName = computed(() => {
  switch (route.path) {
    case '/':
      return 'fade-up'
    case '/home':
      return 'slide-right'
    case '/dashboard':
      return 'slide-left'
    case '/orders':
      return 'fade-down'
    case '/checkout':
      return 'fade'
    default:
      return 'fade'
  }
})
</script>

<style>
:root {
  --forest-primary: #2d5a27;
  --forest-light: #367d2e;
  --forest-dark: #1a3617;
  --neutral-100: #f9fafb;
  --neutral-200: #e5e7eb;
  --neutral-600: #4b5563;
  --neutral-700: #374151;
}

/* ✨ Shared animation settings */
.fade-up-enter-active,
.fade-up-leave-active,
.slide-right-enter-active,
.slide-right-leave-active,
.slide-left-enter-active,
.slide-left-leave-active,
.fade-down-enter-active,
.fade-down-leave-active,
.fade-enter-active,
.fade-leave-active {
  transition: all 0.6s cubic-bezier(0.25, 1.25, 0.5, 1.05);
  will-change: opacity, transform;
}

.fade-up-enter-active,
.slide-right-enter-active,
.slide-left-enter-active,
.fade-down-enter-active {
  transition-delay: 0.05s;
}

/* 🔼 Landing Page */
.fade-up-enter-from {
  opacity: 0;
  transform: translateY(40px) scale(0.98);
}
.fade-up-leave-to {
  opacity: 0;
  transform: translateY(-20px) scale(0.98);
}

/* ▶️ Home */
.slide-right-enter-from {
  opacity: 0;
  transform: translateX(60px) scale(0.97);
}
.slide-right-leave-to {
  opacity: 0;
  transform: translateX(-60px) scale(0.97);
}

/* ◀️ Dashboard */
.slide-left-enter-from {
  opacity: 0;
  transform: translateX(-60px) scale(0.97);
}
.slide-left-leave-to {
  opacity: 0;
  transform: translateX(60px) scale(0.97);
}

/* 🔽 Orders */
.fade-down-enter-from {
  opacity: 0;
  transform: translateY(-40px) scale(0.98);
}
.fade-down-leave-to {
  opacity: 0;
  transform: translateY(40px) scale(0.98);
}

/* ⚪ Checkout + Others */
.fade-enter-from {
  opacity: 0;
  transform: scale(0.98);
}
.fade-leave-to {
  opacity: 0;
  transform: scale(0.98);
}

/* 🩵 Navbar + Footer fade-in */
.fade-soft-enter-active {
  transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.33, 1, 0.68, 1);
}
.fade-soft-enter-from {
  opacity: 0;
  transform: translateY(-10px);
}

/* Page transitions */
.page-enter-active,
.page-leave-active {
  @apply transition-all duration-300 ease-out;
}

.page-enter-from,
.page-leave-to {
  @apply opacity-0 translate-y-4;
}
</style>
