<script setup lang="ts">
import { onMounted } from 'vue';

const props = defineProps({
    category: String
});

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.generalData', {
            usingFor: 'datatable',
            category: props.category
        }),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'label', name: 'label' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'satuan', name: 'satuan' },
            { data: 'jenis_data', name: 'jenis_data' },
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
                    <th>Label</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Jenis Data</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>