<script setup lang="ts">
import { onMounted, nextTick } from 'vue';
import { Button } from '@/Components/ui/button'

onMounted(() => {
    nextTick(() => {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('admin.locationList', 'datatable'),
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama_lokasi', name: 'nama_lokasi' },
                { data: 'koordinat', name: 'koordinat' },
                { data: 'warna', name: 'warna' },
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
                    <th>Nama lokasi</th>
                    <th>Titik koordinat</th>
                    <th>Warna penanda</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>