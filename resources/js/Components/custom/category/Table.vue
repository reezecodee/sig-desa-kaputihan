<script setup lang="ts">
import { onMounted } from 'vue';

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.categories'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_kategori', name: 'nama_kategori' },
            { data: 'icon', name: 'icon' },
            { data: 'deskripsi', name: 'deskripsi' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>

<template>
    <div class="w-full overflow-x-auto">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Icon</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>