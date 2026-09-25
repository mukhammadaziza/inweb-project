<template>
  <div class="border m-20 bg-green-50 p-10">
    <h1 class="text-center text-3xl font-bold mb-8">
      Categories
    </h1>

    <RouterLink to="/categories/create" class="text-2xl p-2 bg-green-200">Create category</RouterLink>

    <table class="w-full border border-gray-300 bg-white m-6">
      <thead>
        <tr class="bg-green-100">
          <th class="border border-gray-300 p-3 text-left">ID</th>
          <th class="border border-gray-300 p-3 text-left">Image</th>
          <th class="border border-gray-300 p-3 text-left">Name</th>
          <th class="border border-gray-300 p-3 text-left">Short Description</th>
          <th class="border border-gray-300 p-3 text-left">Created At</th>
          <th class="border border-gray-300 p-3 text-left">Actions</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="category in categories" :key="category.id">
          <td class="border border-gray-300 p-3">{{ category.id }}</td>

          <td class="border border-gray-300 p-3">
            <img
              v-if="category.image"
              :src="category.image"
              alt="category image"
              class="w-16 h-16 object-cover rounded"
            >
            <span v-else class="text-gray-400 text-sm">No image</span>
          </td>

          <td class="border border-gray-300 p-3">{{ category.name }}</td>
          <td class="border border-gray-300 p-3">{{ category.short_description }}</td>
          <td class="border border-gray-300 p-3">{{ category.created_at }}</td>

          <td class="border border-gray-300 p-3 space-x-3">
            <RouterLink :to="`/categories/${category.id}/edit`">Edit</RouterLink>
            <button @click="deleteCategory(category.id)" class="text-red-600">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="flex justify-center items-center gap-4 mt-6">
      <button
        :disabled="!meta.prevUrl"
        @click="getCategories(currentPage - 1)"
        class="px-4 py-2 border rounded disabled:opacity-50"
      >
        Prev
      </button>

      <span>Page {{ meta.currentPage }} of {{ meta.lastPage }}</span>

      <button
        :disabled="!meta.nextUrl"
        @click="getCategories(currentPage + 1)"
        class="px-4 py-2 border rounded disabled:opacity-50"
      >
        Next
      </button>
    </div>

    <p v-if="error" class="text-red-500 mt-4">
      {{ error }}
    </p>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import api from "@/api/axios"

const categories = ref([])
const error = ref("")
const currentPage = ref(1)

const meta = ref({
  currentPage: 1,
  lastPage: 1,
  prevUrl: null,
  nextUrl: null,
})

async function getCategories(page = 1) {
  try {
    const response = await api.get(`/categories?page=${page}`)
    categories.value = response.data.data
    currentPage.value = page

    meta.value.currentPage = response.data.meta.current_page
    meta.value.lastPage = response.data.meta.last_page
    meta.value.prevUrl = response.data.links.prev
    meta.value.nextUrl = response.data.links.next
  } catch (err) {
    error.value = "Failed to load categories."
  }
}

async function deleteCategory(id) {
  if (!confirm("Delete this category?")) return

  await api.delete(`/categories/${id}`)
  getCategories(currentPage.value)
}

onMounted(() => getCategories(1))
</script>