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
import { ref, onBeforeUnmount } from 'vue'

const props = defineProps({
    errors: Object,
    categoryID: String,
})

const previewUrl = ref<string | null>(null)

const handleFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement
    const file = target.files?.[0] ?? null

    if (file) {
        previewUrl.value = URL.createObjectURL(file)
        setFieldValue('foto_bangunan', file)
    } else {
        previewUrl.value = null
        setFieldValue('foto_bangunan', null)
        if (target) {
            target.value = ''
        }
    }
}

onBeforeUnmount(() => {
    if (previewUrl.value) {
        URL.revokeObjectURL(previewUrl.value)
    }
})

const formSchema = toTypedSchema(z.object({
    nama_bangunan: z.string({ message: 'Nama bangunan wajib di isi' })
        .max(255, { message: 'Nama bangunan tidak boleh lebih dari 255 karakter' })
        .trim(),
    foto_bangunan: z.union([
        z.instanceof(File).refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
        z.null()
    ]),
    deskripsi: z.string({ message: 'Deskripsi bangunan wajib di isi' }).trim(),
    google_maps: z.string({ message: 'Google maps iframe wajib di isi' }).trim(),
    link_lokasi: z.string({ message: 'Link lokasi google maps wajib di isi' }).trim().nullable(),
    kategori_id: z.string(),
}))

const { values, isFieldDirty, handleSubmit, setErrors, setFieldValue } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_bangunan: '',
        foto_bangunan: null,
        deskripsi: '',
        google_maps: '',
        link_lokasi: '',
        kategori_id: props.categoryID
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.buildingSave', props.categoryID), values, {
        onError: (backendErrors) => {
            console.log('Backend errors:', backendErrors)
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form id="add-schedule-form" class="w-full md:w-1/2 space-y-6" @submit="onSubmit">
        <img :src="previewUrl ?? '/placeholder/blog.svg'" alt="" srcset=""
            style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
        <FormField v-slot="{ componentField }" name="foto_bangunan">
            <FormItem>
                <FormLabel>Upload Foto Bangunan</FormLabel>
                <FormControl>
                    <Input type="file" @change="handleFileChange" accept=".png, .jpg, .jpeg" ref="fileInput" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="nama_bangunan" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Nama Bangunan</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan nama bangunan"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="deskripsi" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Deskripsi Bangunan</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan deskripsi bangunan" class="resize-none" v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="google_maps" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Google Maps</FormLabel>
                <FormControl>
                    <Textarea placeholder="Masukan iframe google maps" class="resize-none" v-bind="componentField" />
                    <div class="iframe-wrapper" v-if="values.google_maps" v-html="values.google_maps"></div>
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <FormField v-slot="{ componentField }" name="link_lokasi" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Link Lokasi Bangunan</FormLabel>
                <FormControl>
                    <Input type="text" autocomplete="off" placeholder="Masukkan link lokasi bangunan"
                        v-bind="componentField" />
                </FormControl>
                <FormMessage />
            </FormItem>
        </FormField>
        <div class="flex justify-end">
            <Button class="shadcn-btn edit-btn" type="submit">
                Simpan Bangunan
            </Button>
        </div>
    </form>
</template>

<style scoped>
.iframe-wrapper {
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
}

.iframe-wrapper iframe {
    width: 100%;
    height: 100%;
    border: 0;
    object-fit: cover;
}
</style>