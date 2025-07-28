<script setup lang="ts">
import { onMounted } from 'vue';

const props = defineProps({
    surveyID: String,
    category: String
});

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.facilities', {
            surveyID: props.surveyID,
            category: props.category,
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