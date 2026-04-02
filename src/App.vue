<script setup lang="ts">
</script>

<template>
  <header>
    <nav>
      <router-link to="/">Connexion</router-link> | 
      <router-link to="/dashboard">Dashboard</router-link>
    </nav>
  </header>

  <main>
    <router-view />
  </main>
</template>

<style scoped>
nav {
  padding: 20px;
  background-color: #f4f4f4;
  margin-bottom: 20px;
}
</style>