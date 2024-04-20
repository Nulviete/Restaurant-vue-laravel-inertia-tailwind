<template>
      <div>
        <div class="text-2xl py-6 ">This is a food list</div>
        <div v-for="food in foods" :key="food.id">
            <div class="font-bold">{{ food.name }}</div>
            <div class="italic pl-14">{{ food.description }}</div>
        </div>
    </div>
</template>

<script setup>
import Layout from "../Layouts/Layout.vue"

defineOptions({ layout: Layout })

const props = defineProps({
    foods: Array
})

console.log(props.foods)

</script>

<style lang="scss" scoped>

</style>
