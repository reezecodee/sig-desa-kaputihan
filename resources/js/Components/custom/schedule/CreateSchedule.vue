<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import { Button } from '@/Components/ui/button'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Input } from '@/Components/ui/input'
import { Textarea } from '@/Components/ui/textarea'
import {
    Select, SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from '@/Components/ui/select'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { ref, onBeforeUnmount } from 'vue'

const previewUrl = ref<string | null>(null)

const handleFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement
    const file = target.files?.[0] ?? null
    values.thumbnail = file

    if (file) {
        previewUrl.value = URL.createObjectURL(file)
    } else {
        previewUrl.value = null
    }
}

onBeforeUnmount(() => {
    if (previewUrl.value) {
        URL.revokeObjectURL(previewUrl.value)
    }
})

const formSchema = toTypedSchema(z.object({
    keterangan: z.string({ message: 'Keterangan jadwal wajib di isi' })
        .max(255, { message: 'Keterangan tidak boleh lebih dari 255 karakter' })
        .trim(),
    status: z.enum(['Kegiatan', 'Keagamaan', 'Acara desa', 'Lainnya'], { message: 'Status wajib di isi' }),
    tgl_mulai: z.string({ message: 'Tanggal mulai wajib di isi' })
        .refine((value) => {
            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            return dateRegex.test(value);
        }, {
            message: 'Format tanggal tidak valid (YYYY-MM-DD)',
        })
        .refine((value) => {
            const date = new Date(value);
            return !isNaN(date.getTime());
        }, {
            message: 'Tanggal tidak valid',
        })
        .refine((value) => {
            const today = new Date();
            const inputDate = new Date(value);
            today.setHours(0, 0, 0, 0);
            return inputDate >= today;
        }, {
            message: 'Tanggal tidak boleh di masa lalu',
        }),
    tgl_selesai: z.string({ message: 'Tanggal selesai wajib di isi' })
        .refine((value) => {
            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            return dateRegex.test(value);
        }, {
            message: 'Format tanggal tidak valid (YYYY-MM-DD)',
        })
        .refine((value) => {
            const date = new Date(value);
            return !isNaN(date.getTime());
        }, {
            message: 'Tanggal tidak valid',
        })
        .refine((value) => {
            const today = new Date();
            const inputDate = new Date(value);
            today.setHours(0, 0, 0, 0);
            return inputDate >= today;
        }, {
            message: 'Tanggal tidak boleh di masa lalu',
        }),
}).refine((data) => {
    const tglMulai = new Date(data.tgl_mulai);
    const tglSelesai = new Date(data.tgl_selesai);
    return tglSelesai >= tglMulai;
}, {
    message: 'Tanggal selesai tidak boleh lebih kecil dari tanggal mulai',
    path: ['tgl_selesai'],
}));


defineProps<{ errors: Record<string, string[]> }>()

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        keterangan: null,
        status: null,
        tgl_mulai: null,
        tgl_selesai: null
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.scheduleSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-full space-y-6" @submit="onSubmit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <FormField v-slot="{ componentField }" name="keterangan" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Keterangan</FormLabel>
                    <FormControl>
                        <Input type="text" autocomplete="off" placeholder="Masukkan keterangan jadwal kegiatan"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="status" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Status Jadwal</FormLabel>
                    <FormControl>
                        <Select v-bind="componentField">
                            <SelectTrigger>
                                <SelectValue placeholder="Pilih status" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Status</SelectLabel>
                                    <SelectItem value="Kegiatan">
                                        Kegiatan
                                    </SelectItem>
                                    <SelectItem value="Keagamaan">
                                        Keagamaan
                                    </SelectItem>
                                    <SelectItem value="Acara desa">
                                        Acara Desa
                                    </SelectItem>
                                    <SelectItem value="Lainnya">
                                        Lainnya
                                    </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="tgl_mulai" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Tanggal Mulai Kegiatan</FormLabel>
                    <FormControl>
                        <Input type="date" autocomplete="off" placeholder="Masukkan tanggal mulai kegiatan"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="tgl_selesai" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Tanggal Selesai Kegiatan</FormLabel>
                    <FormControl>
                        <Input type="date" autocomplete="off" placeholder="Masukkan tanggal selesai kegiatan"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
        </div>
        <div class="flex justify-end">
            <Button class="shadcn-btn detail-btn" type="submit">
                Buat Jadwal Kegiatan
            </Button>
        </div>
    </form>
</template>