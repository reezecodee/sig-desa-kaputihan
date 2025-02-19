<script setup lang="ts">
import Navbar from '@/Components/custom/landing/Navbar.vue'
import Footer from '@/Components/custom/landing/Footer.vue'
import { provide } from 'vue';

const props = defineProps({
    village: Object as () => Record<string, string>
})

provide('village', props.village);
</script>

<template>
    <Navbar />
    <main class="main">
        <slot></slot>
    </main>
    <Footer />
</template>

<style scoped></style>