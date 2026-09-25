<template>
  <div class="border m-20 bg-green-50 p-10">
    <h1 class="text-center text-3xl font-bold mb-8">
      Pages
    </h1>

    <table class="w-full border-collapse border border-gray-300 bg-white">
      <thead>
        <tr class="bg-green-100">
          <th class="border border-gray-300 p-3 text-left">ID</th>
          <th class="border border-gray-300 p-3 text-left">Name</th>
          <th class="border border-gray-300 p-3 text-left">Short Description</th>
          <th class="border border-gray-300 p-3 text-left">Created At</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="page in pages" :key="page.id">
          <td class="border border-gray-300 p-3">
            {{ page.id }}
          </td>

          <td class="border border-gray-300 p-3">
            {{ page.name }}
          </td>

          <td class="border border-gray-300 p-3">
            {{ page.short_description }}
          </td>

          <td class="border border-gray-300 p-3">
            {{ page.created_at }}
          </td>
        </tr>
      </tbody>
    </table>

    <p v-if="error" class="text-red-500 mt-4">
      {{ error }}
    </p>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import api from "@/api/axios"

const pages = ref([])
const error = ref("")

async function getPages() {
  try {
    const response = await api.get("/pages")

    pages.value = response.data.data
  } catch (err) {
    error.value = "Failed to load pages."
  }
}

onMounted(getPages)
</script>