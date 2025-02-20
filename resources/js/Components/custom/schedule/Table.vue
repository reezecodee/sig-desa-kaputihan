<script setup lang="ts">
import { onMounted } from 'vue';

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('admin.scheduleList'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'status', name: 'status' },
            { data: 'tgl_mulai', name: 'tgl_mulai' },
            { data: 'tgl_selesai', name: 'tgl_selesai' },
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
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>