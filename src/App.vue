<script setup lang="ts">
import { ref, onMounted, watch } from 'vue' 
import { useRouter, useRoute } from 'vue-router' 

const router = useRouter()
const route = useRoute()
const isAuthenticated = ref(false)

const checkAuth = () => {
  const userStatus = localStorage.getItem('user_authenticated')
  isAuthenticated.value = userStatus === 'true'
}

onMounted(() => {
  checkAuth()
})

watch(() => route.path, () => {
  checkAuth()
})

const handleLogout = () => {
  localStorage.clear()
  isAuthenticated.value = false
  router.push('/')
}
</script>

<template>
  <div class="min-h-screen flex flex-col bg-gray-50">
    
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-4">
      <nav class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="font-bold text-blue-600 text-xl italic underline decoration-2 underline-offset-4">
          Dashboard
        </div>
        
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
            class="px-4 py-2 rounded-lg text-sm font-medium bg-red-50 text-red-600 hover:bg-red-100 transition-all active:scale-95 cursor-pointer"
          >
            Déconnexion
          </button>
        </div>
      </nav>
    </header>

    <main class="max-w-7xl mx-auto p-6 w-full flex-grow">
      <router-view />
    </main>

    <footer class="bg-white border-t border-gray-100 py-8">
      <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="text-gray-500 text-sm">
          <span class="font-bold text-blue-600">MySecureApp</span> 
          © {{ new Date().getFullYear() }} — Tous droits réservés.
        </div>

        <div class="flex gap-6 text-sm font-medium text-gray-600">
          <a href="#" class="hover:text-blue-600 transition-colors">Support</a>
          <a href="#" class="hover:text-blue-600 transition-colors">Confidentialité</a>
          <a href="#" class="hover:text-blue-600 transition-colors">Contact</a>
        </div>
      </div>
    </footer>
  </div>
</template>