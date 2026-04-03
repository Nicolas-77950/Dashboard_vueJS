<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    
    <div class="w-full max-w-2xl bg-white border border-gray-100 rounded-[2.5rem] shadow-xl p-8 md:p-12">
      
      <h1 class="text-3xl font-black text-gray-800 mb-8 text-center uppercase tracking-tighter">
        Connexion 🔑
      </h1>
      
      <form @submit.prevent="handleLogin" class="space-y-6">
        
        <div class="p-4 bg-gray-50 border border-gray-200 rounded-2xl focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
          <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
            Adresse Email
          </label>
          <input 
            id="email"
            type="email" 
            v-model="email" 
            placeholder="votre@email.com"
            class="w-full bg-transparent border-none outline-none p-0 text-gray-800 placeholder-gray-300 text-lg"
            required
          >
        </div>

        <div class="p-4 bg-gray-50 border border-gray-200 rounded-2xl focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
          <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
            Mot de passe
          </label>
          <input 
            id="password"
            type="password" 
            v-model="password"
            placeholder="••••••••"
            class="w-full bg-transparent border-none outline-none p-0 text-gray-800 placeholder-gray-300 text-lg"
            required
          >
        </div>

        <div class="p-4 bg-gray-50 border border-gray-200 rounded-2xl focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
          <label for="username" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">
            Nom d'utilisateur
          </label>
          <input 
            id="username"
            type="text" 
            v-model="username"
            placeholder="Ex: JeanDupont"
            class="w-full bg-transparent border-none outline-none p-0 text-gray-800 placeholder-gray-300 text-lg"
            required
          >
        </div>

        <button 
          type="submit" 
          class="w-full py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95"
        >
          Se connecter
        </button>
      </form>

      <p class="mt-8 text-center text-gray-400 text-sm">
        Connecté en tant que : <span class="text-blue-500 font-medium">{{ email || '...' }}</span>
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const username = ref('')
const router = useRouter()

const handleLogin = () => {
  if (email.value === 'test@test.com' && password.value === '1234') {

    localStorage.setItem('user_authenticated', 'true')

    localStorage.setItem('user_email', email.value)
    
    localStorage.setItem('user_username', username.value)
    // 2. On redirige vers le Dashboard
    router.push('/dashboard')
  } else {
    alert('Identifiants incorrects ! (Utilisez test@test.com / 1234)')
  }
}
</script>

