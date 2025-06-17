<script setup lang="ts">
import Navbar from '@/Components/customv2/Navbar.vue';
import Footer from '@/Components/customv2/Footer.vue';
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
