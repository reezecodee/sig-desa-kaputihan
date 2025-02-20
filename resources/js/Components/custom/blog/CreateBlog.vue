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
    judul: z.string({ message: 'Judul blog wajib di isi' })
        .max(255, { message: 'Judul tidak boleh lebih dari 255 karakter' })
        .trim(),
    thumbnail: z.instanceof(File, { message: 'Thumbnail blog wajib diunggah' })
        .refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
    konten: z.string({ message: 'Konten blog wajib di isi' }).trim(),
    visibilitas: z.enum(['Publik', 'Privasi'], { message: 'Visibilitas wajib di isi' })
}))

defineProps<{ errors: Record<string, string[]> }>()

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        judul: null,
        thumbnail: null,
        konten: null,
        visibilitas: null
    }
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
    <form class="w-full md:w-1/2 space-y-6" @submit="onSubmit">
        <img :src="previewUrl ?? '/placeholder/blog.svg'" alt="" srcset=""
            style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
        <FormField v-slot="{ componentField }" name="thumbnail" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Upload Thumbnail</FormLabel>
                <FormControl>
                    <Input type="file" @change="handleFileChange" accept=".png, .jpg"
                        placeholder="Upload thumbnail blog" v-bind="componentField" />
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
            <Button class="shadcn-btn detail-btn" type="submit">
                Buat Blog
            </Button>
        </div>
    </form>
</template>