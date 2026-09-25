<template>
    <div class="border m-20 bg-green-50 p-10">
        <h1 class="text-center text-3xl font-bold mb-8">
            Create Category
        </h1>

        <form @submit.prevent="createCategory" class="bg-white p-6">

            <input
                v-model="form.name"
                type="text"
                placeholder="Name"
                class="w-full border p-3 mb-4"
            >

            <input
                type="file"
                @change="form.image = $event.target.files[0]"
                class="w-full border p-3 mb-4"
            >

            <textarea
                v-model="form.short_description"
                placeholder="Short description"
                class="w-full border p-3 mb-4"
                rows="3"
            ></textarea>

            <label class="block mb-2">
                Full Description
            </label>

            <QuillEditor
                v-model:content="form.full_description"
                contentType="html"
                theme="snow"
                class="mb-6"
            />

            <button
                type="submit"
                class="bg-green-600 text-white px-6 py-3"
            >
                Create
            </button>

        </form>
    </div>
</template>

<script setup>
import { ref } from "vue"
import { useRouter } from "vue-router"
import { QuillEditor } from "@vueup/vue-quill"
import "@vueup/vue-quill/dist/vue-quill.snow.css"
import api from "@/api/axios"

const router = useRouter()

const form = ref({
    name: "",
    image: null,
    short_description: "",
    full_description: ""
})

async function createCategory() {
    const data = new FormData()

    data.append("name", form.value.name)
    data.append("image", form.value.image)
    data.append("short_description", form.value.short_description)
    data.append("full_description", form.value.full_description)

    await api.post("/categories", data)

    router.push("/categories")
}
</script>