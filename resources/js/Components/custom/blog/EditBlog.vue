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

const formSchema = toTypedSchema(z.object({
    nama: z.string({ message: 'Nama wajib di isi' }).max(255, { message: 'Nama tidak boleh lebih dari 255 karakter' }).trim(),
}))

defineProps<{ errors: Record<string, string> }>()

const { isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.blogSave'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-1/2 space-y-6" @submit="onSubmit">
        <img src="/placeholder/blog.svg" alt="" srcset="" style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
        <FormField v-slot="{ componentField }" name="judul" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Upload Thumbnail</FormLabel>
                <FormControl>
                    <Input type="file" autocomplete="off" placeholder="Upload thumbnail blog" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="judul" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Judul Blog</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan judul dari blog"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="konten" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Konten Blog</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan konten yang ingin di masukkan" class="resize-none"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="visibilitas" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Visibilitas Blog</FormLabel>
                <FormControl>
                    <Select v-bind="componentField">
                        <SelectTrigger>
                            <SelectValue placeholder="Pilih visibilitas" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Visibilitas</SelectLabel>
                                <SelectItem value="Publik">
                                    Publik
                                </SelectItem>
                                <SelectItem value="Privasi">
                                    Privasi
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="flex justify-end">
            <Button type="submit">
                Buat Blog
            </Button>
        </div>
    </form>
</template>