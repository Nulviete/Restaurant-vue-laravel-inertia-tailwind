import { defineStore } from "pinia";
import { ref } from 'vue'

export const useUserStore = defineStore('user', () => {
    const userName = ref('')

    const getUser = (name) => {
        userName.value = name
    }

    return { userName, getUser }
})
