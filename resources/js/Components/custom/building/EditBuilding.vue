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
import { ref, onBeforeUnmount, inject } from 'vue'

const props = defineProps({
    building: Object,
    categories: Object,
    errors: Object,
})

const previewUrl = ref<string | null>(props.building.foto_bangunan ? `/storage/foto-bangunan/${props.building.foto_bangunan}` : null)

const handleFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement
    const file = target.files?.[0] ?? null

    if (file) {
        previewUrl.value = URL.createObjectURL(file)
        setFieldValue('foto_bangunan', file)
    } else {
        previewUrl.value = null
        setFieldValue('foto_bangunan', null)
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
        nama_bangunan: props.building.nama_bangunan,
        foto_bangunan: null,
        deskripsi: props.building.deskripsi,
        google_maps: props.building.google_maps,
        link_lokasi: props.building.link_lokasi,
        kategori_id: props.building.kategori_id
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.buildingUpdate', props.building.id), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <div class="flex flex-col gap-8 md:flex-row">
        <form class="w-full md:w-1/2 space-y-6" @submit.prevent="onSubmit">
            <img :src="previewUrl ?? '/placeholder/blog.svg'" alt="" srcset=""
                style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
            <FormField v-slot="{ componentField }" name="foto_bangunan" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Upload Foto Bangunan</FormLabel>
                    <FormControl>
                        <Input type="file" @change="handleFileChange" accept=".png, .jpg"
                            placeholder="Upload foto bangunan" v-bind="componentField" />
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
                        <Textarea placeholder="Masukan deskripsi bangunan" class="resize-none"
                            v-bind="componentField" />
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <FormField v-slot="{ componentField }" name="google_maps" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Google Maps</FormLabel>
                    <FormControl>
                        <Textarea placeholder="Masukan iframe google maps" class="resize-none h-60"
                            v-bind="componentField" />
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
            <FormField v-slot="{ componentField }" name="kategori_id" :validate-on-blur="!isFieldDirty">
                <FormItem>
                    <FormLabel>Kategori Bangunan</FormLabel>
                    <FormControl>
                        <Select v-bind="componentField">
                            <SelectTrigger>
                                <SelectValue placeholder="Pilih kategori" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Kategori</SelectLabel>
                                    <SelectItem v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.nama_kategori }}
                                    </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                    </FormControl>
                    <FormMessage />
                </FormItem>
            </FormField>
            <div class="flex justify-end">
                <Button class="shadcn-btn edit-btn" type="submit">
                    Edit Bangunan
                </Button>
            </div>
        </form>

        <form class="w-full md:w-1/2 space-y-6" @submit.prevent="">
            <form class="w-full space-y-6 md:w-1/2">
                <div class="flex items-center space-x-4">
                    <label for="images" class="text-sm font-medium">Foto Bangunan</label>
                    <button type="button"
                        class="inline-flex h-10 items-center justify-center whitespace-nowrap rounded-md border border-input bg-background px-4 py-2 text-sm font-medium ring-offset-background transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Pilih Gambar
                    </button>
                    <button type="submit"
                        class="inline-flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground ring-offset-background transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Unggah
                    </button>
                </div>
            </form>

            <div class="mt-10">
                <h2 class="mb-4 text-xl font-semibold">Galeri Foto Bangunan</h2>
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-3">
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/FF0000" alt="Bangunan 1"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/00FF00" alt="Bangunan 2"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/0000FF" alt="Bangunan 3"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/FFFF00" alt="Bangunan 4"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/FF00FF" alt="Bangunan 5"
                            class="h-full w-full object-cover">
                    </div>
                    <div class="relative aspect-square overflow-hidden rounded-md shadow-md">
                        <img src="https://via.placeholder.com/150/00FFFF" alt="Bangunan 6"
                            class="h-full w-full object-cover">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<style scoped>
.iframe-wrapper {
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
}

.iframe-wrapper :deep(iframe) {
    width: 100%;
    height: 100%;
    border: 0;
}
</style>