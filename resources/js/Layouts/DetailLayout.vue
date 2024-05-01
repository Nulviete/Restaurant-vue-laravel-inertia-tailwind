<template>
    <div class="mx-auto ">
        <div>
           <div class="navbar text-4xl text-center bg-red-200 h-24 py-auto content-center">Super good restaurant, awesome!
            <ul class="flex flex-row justify-center text-lg gap-4 pt-4">
                <Link href="/" id="item" class="item">Back to the food list</Link>
            </ul>
        </div>
        <div class="user absolute right-0 top-10 pr-5">
            <Link href="/login" class="pr-5">Login</Link>

        </div>
        </div>


            <div class="bg-blue-100 mx-auto pl-40 container">
                <slot />
            </div>

        <div class="footer text-4xl text-center bg-gray-400 h-16 py-auto content-center">Footer</div>
    </div>
</template>

<script setup>
import { storeToRefs } from 'pinia'
import { useFoodStore } from '../Stores/FoodStore'
import { Link } from '@inertiajs/vue3'





</script>

<style lang="scss" scoped>
.container{
    background-color: rgb(235, 243, 245);
}
.navbar li:hover{
    cursor: pointer;
}
.active {
    color: white;
}
</style>
