<script setup lang="ts">
import Navbar from '@/Components/custom_second/Navbar.vue';
import Footer from '@/Components/custom_second/Footer.vue';
</script>

<template>
    <div class="site-wrap">
        <Navbar />
        <main>
            <slot />
            <Footer/>
        </main>
    </div>
</template>
