<template>
    <div class="container mx-auto ">
        <div class="navbar text-4xl text-center bg-red-200 h-24 py-auto content-center">Super good restaurant, awesome!</div>

        <slot />
        <div class="footer">Footer</div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.container{
    background-color: rgb(235, 243, 245);
}
</style>
