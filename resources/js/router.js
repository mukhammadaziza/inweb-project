import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { path: '/', component: () => import('./views/Welcome.vue') },
  { path: '/login', component: () => import('./views/auth/LoginView.vue') },
  { path: '/dashboard', component: () => import('./views/auth/DashboardView.vue') },

  // Categories
  { path: '/categories', component: () => import('./views/categories/IndexView.vue') },
  { path: '/categories/create', component: () => import('./views/categories/CreateView.vue') },
  { path: '/categories/:id/edit', component: () => import('./views/categories/EditView.vue') },

  // Products
  { path: '/products', component: () => import('./views/products/IndexView.vue') },
  { path: '/products/create', component: () => import('./views/products/CreateView.vue') },
  { path: '/products/:id/edit', component: () => import('./views/products/EditView.vue') },

  // Pages
  { path: '/pages', component: () => import('./views/pages/IndexView.vue') },
  { path: '/pages/create', component: () => import('./views/pages/CreateView.vue') },
  { path: '/pages/:id/edit', component: () => import('./views/pages/EditView.vue') },
]

export default createRouter({
  history: createWebHistory(),
  routes
})