<script setup lang="ts">
import Navbar from '@/Components/custom/landing/Navbar.vue'
import Footer from '@/Components/custom/landing/Footer.vue'
</script>

<template>
    <Navbar />
    <main class="main">
        <slot></slot>
    </main>
    <Footer />
</template>

<style scoped></style>