<script setup lang="ts">
import { onMounted } from 'vue';

const props = defineProps({
    status: String
});

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.reports', props.status),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_pelapor', name: 'nama_pelapor' },
            { data: 'kontak_pelapor', name: 'kontak_pelapor' },
            { data: 'judul_laporan', name: 'judul_laporan' },
            { data: 'kategori_laporan', name: 'kategori_laporan' },
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
                    <th>Nama Pelapor</th>
                    <th>Kontak Pelapor</th>
                    <th>Judul Laporan</th>
                    <th>Kategori Laporan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>