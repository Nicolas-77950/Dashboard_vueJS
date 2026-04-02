<template>
  <div>
    <h1>Tableau de bord 📊</h1>
    <p>Bienvenue dans votre espace sécurisé.</p>

    <p> {{ welcomeMessage }}</p>

    <p>Dernière connexion le : {{ lastLogin }}</p>
    
    <button @click="handleLogout">Se déconnecter</button>
  </div>
    
</template>


<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const userEmail = ref('')
const userUsername = ref('')
const lastLogin = ref('')

onMounted(() => {
  // On va chercher l'email dans le localStorage
  const savedEmail = localStorage.getItem('user_email')
   
  if (savedEmail) {
    userEmail.value = savedEmail
  }
  const savedUsername = localStorage.getItem('user_username')

  if(savedUsername) {
    userUsername.value = savedUsername
  }
  lastLogin.value = localStorage.getItem('last_login') || ''
})
  

const welcomeMessage = computed(() => {
  if (userUsername.value) {
    return `Ravi de vous revoir, ${userUsername.value} !`
  } else if (userEmail.value) {
    return `Bienvenue, ${userEmail.value}`
  } else {
    return "Bienvenue, cher invité"
  }
})


const handleLogout = () => {
  localStorage.removeItem('user_authenticated')
  localStorage.removeItem('user_email')
  localStorage.removeItem('user_username')

  
  const now = new Date().toLocaleString() 
    localStorage.setItem('last_login', now)
  
  // 2. On renvoie l'utilisateur à l'accueil (Login)
  router.push('/')
}

</script>