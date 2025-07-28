<script setup lang="ts">
import { onMounted } from 'vue';
import { router } from '@inertiajs/vue3';

onMounted(() => {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('datatable.surveys'),
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tahun_survey', name: 'tahun_survey' },
            { data: 'diaktifkan', name: 'diaktifkan' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});

const redirectToDetail = (id) => {
    router.visit(route('admin.chartMenu', id), {
        preserveState: false
    })
}

onMounted(() => {
    document.addEventListener('click', function (event) {
        if (event.target instanceof HTMLElement) {
            const targetElement = event.target;

            if (targetElement.classList.contains('delete-btn')) {
                const id = targetElement.getAttribute('data-id');
                // confirmDelete(id);
            } else if (targetElement.classList.contains('detail-btn')) {
                const id = targetElement.getAttribute('data-id');
                redirectToDetail(id);
            }
        }
    })
});
</script>

<template>
    <div class="w-full overflow-x-auto">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun Survey</th>
                    <th>Diaktifkan</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<style scoped></style>