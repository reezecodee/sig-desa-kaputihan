<script setup lang="ts">
import { onMounted } from 'vue';

const props = defineProps({
    surveyID: String
});

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.populationGroups', props.surveyID),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'rentang_umur', name: 'rentang_umur' },
            { data: 'laki_laki', name: 'laki_laki' },
            { data: 'perempuan', name: 'perempuan' },
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
                    <th>Rentang Umur</th>
                    <th>Jumlah Laki-laki</th>
                    <th>Jumlah Perempuan</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>