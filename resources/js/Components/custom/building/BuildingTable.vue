<script setup lang="ts">
import { onMounted, nextTick } from 'vue';

const props = defineProps({
    categoryID: String
});

onMounted(() => {
    nextTick(() => {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('datatable.buildings', props.categoryID),
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
    <div class="w-full overflow-x-auto">
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
    </div>
</template>

<style scoped></style>