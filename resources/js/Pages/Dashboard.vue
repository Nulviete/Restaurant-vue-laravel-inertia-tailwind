

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                </div>
                <div>
                <form class="flex flex-col w-64 pt-5" enctype="multipart/form-data" @submit.prevent="form.post('/food')">
                    <label>Add new meal</label>
                    <input type="text" v-model="form.name" placeholder="Meal name">
                    <input type="text" v-model="form.category" placeholder="Meal category">
                    <input type="text" v-model="form.description" placeholder="Meal description">
                    <input class="form-control" type="file" name="file" id="formFile">
                    <input type="submit" value="Create the new meal">
                </form>
            </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const form = useForm({
    name: '',
    category: '',
    description: ''
})

</script>
