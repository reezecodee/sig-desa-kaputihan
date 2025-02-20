<script setup lang="ts">
import { onMounted } from 'vue';
import { Button } from '@/Components/ui/button'

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('admin.blogList'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'judul', name: 'judul' },
            { data: 'visibilitas', name: 'visibilitas' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>

<template>
    <div class="w-full overflow-x-auto">
        <table id="myTable" class="table table-striped min-w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Visibilitas</th>
                    <th>Ditambahkan Pada</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>