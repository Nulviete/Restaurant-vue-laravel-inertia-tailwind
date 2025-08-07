<template>
<div>
    <div>
        <p>Detail page</p>
        <form @submit.prevent="form.put(`/food/update/${food.id}`)" class="flex flex-col">
            <input type="text" value="Name" v-model="form.name">
            <input type="text" value="Category" v-model="form.category">
            <input type="text" value="Description" v-model="form.description">
            <button class="border-solid border-2 border-indigo-600 w-20">Update</button>
        </form>
    </div>
</div>

</template>

<script setup>
import DetailLayout from "../Layouts/DetailLayout.vue"
import { Head, useForm } from '@inertiajs/vue3';
import { watchEffect } from "vue";

defineOptions({ layout: DetailLayout })

const props = defineProps({
    food: Object
})

const form = useForm({
    name: props.food.name,
    category: props.food.category,
    description: props.food.description
})


</script>

<style lang="scss" scoped>

</style>
