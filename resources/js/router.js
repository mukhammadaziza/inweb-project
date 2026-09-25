import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { path: '/', component: () => import('./views/Welcome.vue') },
  { path: '/login', component: () => import('./views/auth/LoginView.vue') },
  { path: '/dashboard', component: () => import('./views/auth/DashboardView.vue'), meta: { requiresAuth: true } },

  // Categories
  { path: '/categories', component: () => import('./views/categories/IndexView.vue') },
  { path: '/categories/create', component: () => import('./views/categories/CreateView.vue'), meta: { requiresAuth: true } },
  { path: '/categories/:id/edit', component: () => import('./views/categories/EditView.vue'), meta: { requiresAuth: true } },

  // Products
  { path: '/products', component: () => import('./views/products/IndexView.vue') },
  { path: '/products/create', component: () => import('./views/products/CreateView.vue'), meta: { requiresAuth: true } },
  { path: '/products/:id/edit', component: () => import('./views/products/EditView.vue'), meta: { requiresAuth: true } },

  // Pages
  { path: '/pages', component: () => import('./views/pages/IndexView.vue') },
  { path: '/pages/create', component: () => import('./views/pages/CreateView.vue'), meta: { requiresAuth: true } },
  { path: '/pages/:id/edit', component: () => import('./views/pages/EditView.vue'), meta: { requiresAuth: true } },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')

  if (to.meta.requiresAuth && !token) {
    next('/login')
  } else if (to.path === '/login' && token) {
    next('/dashboard')
  } else {
    next()
  }
})

export default router