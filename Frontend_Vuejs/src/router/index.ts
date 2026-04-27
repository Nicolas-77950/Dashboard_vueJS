import { createRouter, createWebHistory, type RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'login',
    component: () => import('../views/login/LoginView.vue') 
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('../views/dashboard/DashboardView.vue')
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('../views/register/RegisterView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router