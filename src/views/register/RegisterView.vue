<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const username = ref('')
const router = useRouter()

const handleRegister = () => {
    if (email.value && username.value && password.value) {

    localStorage.setItem('registered_email', email.value)

    localStorage.setItem('registered_username', username.value)
    
    localStorage.setItem('registered_password', password.value)

    router.push('/')
  } else {
    alert('Veuillez remplir tout les champs')
  }
}

</script>

<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Créer un compte</h2>
    
    <form @submit.prevent="handleRegister" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
        <input v-model="username" type="text" class="w-full p-2 border rounded-lg mt-1" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input v-model="email" type="email" class="w-full p-2 border rounded-lg mt-1" required>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input v-model="password" type="password" class="w-full p-2 border rounded-lg mt-1" required>
      </div>
      
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
        S'inscrire
      </button>
    </form>
  </div>
</template>

