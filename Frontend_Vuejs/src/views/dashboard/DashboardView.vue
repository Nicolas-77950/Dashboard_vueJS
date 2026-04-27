<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Tableau de bord 📊</h1>
    <p class="text-gray-600 mb-6">Bienvenue dans votre espace sécurisé.</p>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm space-y-4 mb-6">
      <p class="text-lg font-medium text-blue-600 border-b pb-2"> 
        {{ welcomeMessage }}
      </p>
      <p class="text-sm text-gray-500 italic">
        Dernière connexion le : <span class="font-mono">{{ lastLogin || 'Non disponible' }}</span>
      </p>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
      <h2 class="text-xl font-bold mb-4 text-gray-800 border-b pb-2">Mes tâches Symfony 🐘</h2>
      <ul v-if="tasks.length > 0" class="space-y-2">
        <li v-for="task in tasks" :key="task.id" class="flex items-center gap-3 p-2 bg-gray-50 rounded">
          <input type="checkbox" :checked="task.completed" />
          <span :class="{'line-through text-gray-400': task.completed}">{{ task.title }}</span>
        </li>
      </ul>
      <p v-else class="text-gray-400">Chargement des tâches...</p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'

const userEmail = ref('')
const userUsername = ref('')
const lastLogin = ref('')
const tasks = ref<any[]>([])

onMounted(async () => {
  userEmail.value = localStorage.getItem('user_email') || ''
  userUsername.value = localStorage.getItem('user_username') || ''
  lastLogin.value = localStorage.getItem('last_login') || ''

  await fetchTasks()
})

const fetchTasks = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/tasks')
    if (!response.ok) throw new Error('Erreur réseau')
    
    const data = await response.json()
    
    tasks.value = data 
    
    console.log("Données reçues :", data)
  } catch (error) {
    console.error("Erreur :", error)
  }
}

const welcomeMessage = computed(() => {
  if (userUsername.value) return `Ravi de vous revoir, ${userUsername.value} !`
  if (userEmail.value) return `Bienvenue, ${userEmail.value}`
  return "Bienvenue, cher invité"
})
</script>