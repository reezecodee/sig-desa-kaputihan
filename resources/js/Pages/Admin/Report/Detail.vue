<script setup lang="ts">
import App from '@/Layouts/App.vue'
import { Head, router } from '@inertiajs/vue3';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import Separator from '@/Components/ui/separator/Separator.vue';
import { computed } from 'vue';
import Label from '@/components/ui/label/Label.vue';
import Button from '@/components/ui/button/Button.vue';
import {
    Select, SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/Components/ui/select'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form';
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'

const props = defineProps({
    title: String,
    report: Object,
})

const statusClasses = computed(() => {
    switch (props.report.status) {
        case 'Selesai':
            return 'bg-green-100 text-green-800';
        case 'Ditolak':
            return 'bg-red-100 text-red-800';
        case 'Diproses':
            return 'bg-blue-100 text-blue-800';
        case 'Diverifikasi':
            return 'bg-yellow-100 text-yellow-800';
        case 'Dikirim':
        default:
            return 'bg-gray-100 text-gray-800';
    }
});

const formSchema = toTypedSchema(z.object({
    status: z.enum(
        ['Dikirim', 'Diverifikasi', 'Diproses', 'Selesai', 'Ditolak'],
        {
            required_error: 'Status wajib dipilih.',
        }
    ),
}));

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        status: props.report.status,
    }
})

const onSubmit = handleSubmit((value) => {
    router.patch(route('admin.reportUpdateStatus', props.report.id), value, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    });
})
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>
        <Card>
            <CardHeader>
                <CardTitle>
                    Informasi Laporan
                </CardTitle>
            </CardHeader>
            <CardContent class="space-y-6">
                <div class="grid grid-cols-[auto_1fr] items-center gap-x-4 gap-y-2">
                    <Label class="text-sm text-muted-foreground">Nama Pelapor</Label>
                    <p class="font-semibold">{{ report.nama_pelapor }}</p>

                    <Label class="text-sm text-muted-foreground">Kontak Pelapor</Label>
                    <p class="font-semibold">{{ report.kontak_pelapor }}</p>

                    <Label class="text-sm text-muted-foreground">Kategori Laporan</Label>
                    <p class="font-semibold">{{ report.kategori_laporan }}</p>

                    <Label class="text-sm text-muted-foreground">Status Laporan</Label>
                    <span class="inline-block w-fit rounded-full px-3 py-1 text-xs font-semibold"
                        :class="statusClasses">
                        {{ report.status }}
                    </span>
                </div>

                <Separator />

                <div class="flex flex-col space-y-1.5">
                    <Label class="text-sm text-muted-foreground">Judul Laporan</Label>
                    <p class="text-lg font-bold">{{ report.judul_laporan }}</p>
                </div>

                <div class="flex flex-col space-y-1.5">
                    <Label class="text-sm text-muted-foreground">Pesan Laporan</Label>
                    <p class="text-base leading-relaxed">{{ report.pesan_laporan }}</p>
                </div>
            </CardContent>
        </Card>
        <Card>
            <CardHeader>
                <CardTitle>
                    Edit Status Laporan
                </CardTitle>
            </CardHeader>
            <CardContent class="space-y-6">
                <form @submit.prevent="onSubmit">
                    <div class="space-y-2 mb-4">
                        <FormField v-slot="{ componentField }" name="status">
                            <FormItem>
                                <FormLabel>Ubah Status Laporan</FormLabel>
                                <Select v-bind="componentField" :validate-on-blur="!isFieldDirty">
                                    <FormControl>
                                        <SelectTrigger>
                                            <SelectValue placeholder="Pilih status baru..." />
                                        </SelectTrigger>
                                    </FormControl>
                                    <SelectContent>
                                        <SelectItem value="Dikirim">Dikirim</SelectItem>
                                        <SelectItem value="Diverifikasi">Diverifikasi</SelectItem>
                                        <SelectItem value="Diproses">Diproses</SelectItem>
                                        <SelectItem value="Selesai">Selesai</SelectItem>
                                        <SelectItem value="Ditolak">Ditolak</SelectItem>
                                    </SelectContent>
                                </Select>
                                <FormMessage />
                            </FormItem>
                        </FormField>
                    </div>

                    <div class="flex justify-end">
                        <Button class="shadcn-btn edit-btn" type="submit">
                            Simpan Perubahan
                        </Button>
                    </div>
                </form>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>