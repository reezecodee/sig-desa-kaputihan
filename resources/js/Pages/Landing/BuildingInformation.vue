<script setup lang="ts">
import Landing from '@/Layouts/Landing.vue'
import Building from '@/Pages/Landing/section/Building.vue'

defineProps({
    title: String
})
</script>
<template>
    <Landing :title="title">
        <div class="page-title light-background">
            <div class="container">
                <h1>Informasi Bangunan</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Informasi Bangunan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <Building></Building>
    </Landing>
</template>

<style scoped></style>