<script setup lang="ts">
import { onMounted } from 'vue';

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('admin.complaintList'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul', name: 'judul' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>

<template>
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status Aduan</th>
                <th>Diajukan Pada</th>
                <th>Ditanggapi Pada</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</template>

<style scoped>

</style>