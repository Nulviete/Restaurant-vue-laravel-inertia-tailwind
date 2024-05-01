<template>
      <div>
        <div class="text-2xl py-6 ">This is our menu</div>

        <div v-for="food in foodsToDisplay" :key="food.id" class="flex flex-row py-2">
            <div class="left w-96">
               <div class="font-bold">{{ food.name }}</div>
            <div class="italic pl-14">{{ food.description }} - {{ food.category }}</div>
            </div>
            <div class="right flex flex-row items-center">
                <img :src="`/storage/images/${food.name}.jpeg`" alt="">
                <div>
                    <Link :href="`/detail/${food.id}`" class="bg-pink-300 p-2 ml-8 border rounded-md hover:bg-pink-400 ease-in duration-200">Detail</Link>
                    <button @click="destroy(food.id)" class="bg-red-700 text-white p-2 ml-2 border rounded-md hover:bg-red-500 ease-in duration-200">Delete</button>

                </div>
            </div>

        </div>
        <div>
            <!-- {{ $page.props.auth.user.name }} -->
        </div>
    </div>
</template>

<script setup>
import { storeToRefs } from "pinia"
import Layout from "../Layouts/Layout.vue"
import { useFoodStore } from '../Stores/FoodStore'
import { onMounted, ref, watchEffect } from 'vue'
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: Layout })

const props = defineProps({
    foods: Array
})

const store = useFoodStore()
const { foodss, soups, mains, deserts, showSoups, showMains, showDeserts } = storeToRefs(store)
let foodsToDisplay = ref()

store.getFoods(props.foods)

onMounted(() =>{
    foodsToDisplay.value = foodss.value
})
watchEffect(() => {
    if (showSoups.value) foodsToDisplay.value = soups.value
    if (showMains.value) foodsToDisplay.value = mains.value
    if (showDeserts.value) foodsToDisplay.value = deserts.value
    if(!showSoups.value && !showMains.value && !showDeserts.value) foodsToDisplay.value = foodss.value
})

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        router.delete('/food/delete/'+id)
    }
}


</script>

<style lang="scss" scoped>
.right img {
    width: 150px;
    min-width: 150px;
    height: 100px;
}

</style>
