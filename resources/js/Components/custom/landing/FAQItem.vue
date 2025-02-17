<script setup lang="ts">
defineProps({
    quest: String,
    answer: String
})
</script>

<template>
    <div class="faq-item">
        <h3>{{ quest }}</h3>
        <div class="faq-content">
            <p>{{ answer }}
            </p>
        </div>
        <i class="faq-toggle bi bi-chevron-right"></i>
    </div>
</template>

<style scoped></style>