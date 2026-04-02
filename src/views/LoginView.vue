<template>
  <div class="login-container">
    <h1>Connexion 🔑</h1>
    
    <form @submit.prevent="handleLogin">
      <div>
        <label for="email">Email :</label>
        <input 
          id="email"
          type="email" 
          v-model="email" 
          placeholder="votre@email.com"
          required
        >
      </div>

      <div>
        <label for="password">Mot de passe :</label>
        <input 
          id="password"
          type="password" 
          v-model="password"
          required
        >
      </div>

      <div>
        <label for="username">username :</label>
        <input 
          id="username"
          type="text" 
          v-model="username"
          required
        >
      </div>

      <button type="submit">Se connecter</button>
    </form>
    
    <p>Email saisi : {{ email }}</p> </div>
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
    // 1. On "sauvegarde" la connexion dans le navigateur
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

