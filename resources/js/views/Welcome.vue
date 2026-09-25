<template>

  <div class="border m-20 bg-green-50">

    <div class="flex justify-center m-20 text-2xl font-bold">
      <div class="p-2">
        <RouterLink to="/about"></RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/login">Our Projects</RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/login">Partners</RouterLink>
      </div>

      <div class="p-2">
        <RouterLink to="/login">Login</RouterLink>
      </div>
    </div>

    <div class="p-3">
      <h1 class="text-center text-5xl">Welcome</h1>
      <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde id dignissimos quas earum cupiditate tenetur magni sit corporis officia fugit pariatur nulla laboriosam iste quisquam, dolore rerum doloribus nisi vitae?
      </p>
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