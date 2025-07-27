<script setup lang="ts">
import { onMounted } from 'vue';

const props = defineProps({
    categoryFacility: String
});

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.facilities', {
            usingFor: 'datatable',
            categoryFacility: props.categoryFacility
        }),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'label', name: 'label' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'jenis_sapras', name: 'jenis_sapras' },
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
                    <th>Jenis Sarana Prasarana</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>