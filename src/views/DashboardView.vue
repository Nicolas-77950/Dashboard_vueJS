<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Tableau de bord 📊</h1>
    <p class="text-gray-600 mb-6">Bienvenue dans votre espace sécurisé.</p>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm space-y-4">
      <p class="text-lg font-medium text-blue-600 border-b pb-2"> 
        {{ welcomeMessage }}
      </p>
      
      <p class="text-sm text-gray-500 italic">
        Dernière connexion le : <span class="font-mono">{{ lastLogin || 'Non disponible' }}</span>
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'

const userEmail = ref('')
const userUsername = ref('')
const lastLogin = ref('')

onMounted(() => {
  userEmail.value = localStorage.getItem('user_email') || ''
  userUsername.value = localStorage.getItem('user_username') || ''
  lastLogin.value = localStorage.getItem('last_login') || ''
})

const welcomeMessage = computed(() => {
  if (userUsername.value) return `Ravi de vous revoir, ${userUsername.value} !`
  if (userEmail.value) return `Bienvenue, ${userEmail.value}`
  return "Bienvenue, cher invité"
})
</script>