import { defineStore } from "pinia";
import { ref, computed } from 'vue'

export const useFoodStore = defineStore('foodss', () => {
    const foodss = ref()
    const showSoups = ref(false)
    const showMains = ref(false)
    const showDeserts = ref(false)

    const getFoods = (data) => {
        foodss.value = data
    }

    const soups = computed(() => {
        return foodss.value.filter(food => food.category === 'soup')
    })
    const mains = computed(() => {
        return foodss.value.filter(food => food.category === 'main')
    })
    const deserts = computed(() => {
        return foodss.value.filter(food => food.category === 'desert')
    })

    return { foodss, soups, mains, deserts, showSoups, showMains, showDeserts, getFoods }
})
