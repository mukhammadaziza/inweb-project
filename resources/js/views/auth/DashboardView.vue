<template>

  <div class="border m-20 bg-green-50">

    <div class="flex justify-center m-20 text-2xl font-bold">
      <div class="p-2">
        <RouterLink to="/products">Products</RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/categories">Categories</RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/pages">Pages</RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/logout">Logout</RouterLink>
      </div>
    </div>

    <div class="p-3">
      <h1 class="text-center text-5xl">Dashboard</h1>
    </div>
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