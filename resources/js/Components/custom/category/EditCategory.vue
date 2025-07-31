<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import Button from '@/components/ui/button/Button.vue'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Input } from '@/Components/ui/input'
import { Textarea } from '@/Components/ui/textarea'

import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'

const props = defineProps({
    category: Object,
    errors: Object,
})

const formSchema = toTypedSchema(z.object({
    nama_kategori: z.string({ message: 'Nama wajib di isi' })
        .max(255, { message: 'Nama tidak boleh lebih dari 255 karakter' })
        .trim(),
    icon: z.string({ message: 'Icon wajib di isi' })
        .max(255, { message: 'Icon tidak boleh lebih dari 255 karakter' })
        .trim(),
    deskripsi: z.string({ message: 'Deskripsi wajib di isi' })
        .max(255, { message: 'Deskripsi tidak boleh lebih dari 255 karakter' })
        .trim(),
}));

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_kategori: props.category.nama_kategori,
        icon: props.category.icon,
        deskripsi: props.category.deskripsi,
    },
})

const onSubmit = handleSubmit((values) => {
    router.put(route('admin.categoryUpdate', props.category.id), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-full md:w-1/2 space-y-6" @submit="onSubmit">
        <FormField v-slot="{ componentField }" name="nama_kategori" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Nama Kategori</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan nama kategori"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="icon" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Icon</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan tag icon" class="resize-none" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="mt-2 flex justify-end">
            <a href="https://fontawesome.com/v5/search" target="_blank">
                <Button class="shadcn-btn detail-btn">
                    <i class="bi bi-search"></i>
                    Cari icon
                </Button>
            </a>
        </div>
        <FormField v-slot="{ componentField }" name="deskripsi" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Deskripsi</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan deskripsi kategori" class="resize-none" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="flex justify-end">
            <Button class="shadcn-btn edit-btn" type="submit">
                Perbarui Kategori Bangunan
            </Button>
        </div>
    </form>
</template>