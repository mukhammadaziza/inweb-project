<template>
    <div class="min-h-screen bg-green-50 flex items-center justify-center">
        <div class="w-full max-w-md bg-white border border-gray-300 rounded-lg p-8">
            
            <h1 class="text-3xl font-bold text-center mb-8">
                Login
            </h1>

            <form @submit.prevent="login">

                <div class="mb-4">
                    <label class="block mb-2 font-medium">
                        Email
                    </label>

                    <input
                        v-model="form.email"
                        type="email"
                        class="w-full border border-gray-300 rounded p-3"
                        placeholder="Enter your email"
                    >
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium">
                        Password
                    </label>

                    <input
                        v-model="form.password"
                        type="password"
                        class="w-full border border-gray-300 rounded p-3"
                        placeholder="Enter your password"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded hover:bg-green-700"
                >
                    Login
                </button>

                <p
                    v-if="error"
                    class="text-red-500 text-sm mt-4 text-center"
                >
                    {{ error }}
                </p>

            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue"
import { useRouter } from "vue-router"
import api from "@/api/axios"

const router = useRouter()

const form = ref({
    email: "",
    password: ""
})

const error = ref("")

async function login() {
    error.value = ""

    try {
        const response = await api.post("/login", form.value)
        localStorage.setItem("token", response.data.token)
        router.push("/dashboard")
    } catch (err) {
        error.value = "Invalid email or password."
    }
}

</script>