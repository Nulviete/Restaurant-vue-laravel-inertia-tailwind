<template>
    <div class="mx-auto ">
        <div>
           <div class="navbar text-4xl text-center bg-red-200 h-24 py-auto content-center">Super good restaurant, awesome!
            <ul class="flex flex-row justify-center text-lg gap-4 pt-4">
                <li id="item" class="item" @click="active(0); showSoups = !showSoups; showMains = false; showDeserts = false;">Soups</li>
                <li id="item" class="item" @click="active(1); showMains = !showMains; showSoups = false; showDeserts = false;">Main dishes</li>
                <li id="item" class="item" @click="active(2); showDeserts = !showDeserts; showMains = false; showSoups = false;">Deserts</li>
            </ul>
        </div>
        <div v-if="$page.props.auth.user" class="user absolute right-0 top-10 pr-5 justify-center mx-auto">
            <div class="text-center">
               {{ $page.props.auth.user.name }}
            </div>
            <div>
                <Link :href="route('dashboard')" method="get" class="text-center mx-auto bg-green-400 px-5 py-1 mr-2 rounded-md hover:bg-green-200 duration-500">Add Food</Link>
            <Link :href="route('logout')" method="post" as="button" class="text-center mx-auto bg-green-400 px-5 py-1 rounded-md hover:bg-green-200 duration-500">Logout</Link>
            </div>

        </div>
        <div v-else class="user absolute right-0 top-10 pr-5">
            <Link href="/login" class="pr-5 bg-green-400 rounded-md hover:bg-green-200 duration-500 px-5 py-1">Login</Link>

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
import { onMounted, ref, watchEffect } from 'vue'
import { useFoodStore } from '../Stores/FoodStore'
import { Link } from '@inertiajs/vue3'

const store = useFoodStore()
const { showSoups, showMains, showDeserts } = storeToRefs(store)

const isActive = ref(false)

const items = document.getElementsByClassName('item')

const active = (index) => {
    // if selected is already selected, remove class
    if (items.item(index).classList.contains('active')) {
        return  items.item(index).classList.remove('active')
    }
    // cancel all active classes
    for (let i in items) {
        items.item(i).classList.remove('active')
    }
    // add active class to selected
    items.item(index).classList.add('active')
}




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
