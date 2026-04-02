<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const isAuthenticated = ref(false)

onMounted(() => {
  const userStatus = localStorage.getItem('user_authenticated')
  isAuthenticated.value = userStatus === 'true'
})

const handleLogout = () => {

  localStorage.clear() //clear data in localStorage

  isAuthenticated.value = false

  router.push('/')
}
</script>

<template>
  <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-4">
    <nav class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="font-bold text-blue-600 text-xl italic">Dashboard</div>
      
      <div class="flex gap-4">
        <router-link 
          v-if="!isAuthenticated" 
          to="/" 
          class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors text-gray-700"
        >
          Connexion
        </router-link>

        <router-link 
          v-if="isAuthenticated" 
          to="/dashboard" 
          class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors text-gray-700"
        >
          Dashboard
        </router-link>

        <button 
          v-if="isAuthenticated" 
          @click="handleLogout"
          class="px-4 py-2 rounded-lg text-sm font-medium bg-red-50 text-red-600 hover:bg-red-100 transition-all active:scale-95"
        >
          Déconnexion
        </button>
      </div>
    </nav>
  </header>

  <main class="max-w-7xl mx-auto">
    <router-view />
  </main>
</template>