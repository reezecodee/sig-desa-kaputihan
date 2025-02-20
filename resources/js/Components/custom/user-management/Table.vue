<script setup lang="ts">
import { onMounted } from 'vue';
import { Button } from '@/Components/ui/button'

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('admin.userList'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'telepon', name: 'telepon' },
            { data: 'status', name: 'status' },
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>