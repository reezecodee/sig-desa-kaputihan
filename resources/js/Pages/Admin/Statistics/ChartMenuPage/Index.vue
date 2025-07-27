<script setup lang="ts">
// import TableFacilities from '@/Components/custom/statistics/TableFacilities.vue';
import TableOccupations from '@/Components/custom/statistics/TableOccupations.vue';

defineProps({
    categoryFacility: String
})
</script>

<template>
<!-- <TableFacilities :categoryFacility="categoryFacility"/> -->
 <TableOccupations />
</template>

<style scoped>

</style>