<script setup lang="ts">
import { onMounted, nextTick } from 'vue';
import { Button } from '@/Components/ui/button'

const props = defineProps({
    category: String
});

onMounted(() => {
    nextTick(() => {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('admin.buildingList', props.category),
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'foto_bangunan', name: 'foto_bangunan' },
                { data: 'nama_bangunan', name: 'nama_bangunan' },
                { data: 'kategori_bangunan', name: 'kategori_bangunan' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
});
</script>

<template>
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto bangunan</th>
                <th>Nama bangunan</th>
                <th>Kategori bangunan</th>
                <th>Ditambahkan pada</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</template>

<style scoped></style>