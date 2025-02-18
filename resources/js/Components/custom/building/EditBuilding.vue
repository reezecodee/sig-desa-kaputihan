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
import { ref, onBeforeUnmount, inject } from 'vue'

const building = inject('building')

const previewUrl = ref<string | null>(building.foto_bangunan ? `/storage/${building.foto_bangunan}` : null)

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
    kategori_bangunan: z.enum(['Ibadah', 'Pemerintahan', 'Pendidikan', 'Kesehatan', 'Usaha', 'Olahraga', 'Keamanan', 'Lainnya'], { message: 'Kategori bangunan wajib di isi' }),
}))

defineProps<{ errors: Record<string, string[]> }>()

const { values, isFieldDirty, handleSubmit, setErrors, setFieldValue } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_bangunan: building.nama_bangunan,
        foto_bangunan: null,
        deskripsi: building.deskripsi,
        google_maps: building.google_maps,
        link_lokasi: building.link_lokasi,
        kategori_bangunan: building.kategori_bangunan
    }
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.buildingUpdate', building.id), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors)
        }
    })
})
</script>

<template>
    <form class="w-1/2 space-y-6" @submit.prevent="onSubmit">
        <img :src="previewUrl ?? '/placeholder/blog.svg'" alt="" srcset=""
            style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
        <FormField v-slot="{ componentField }" name="foto_bangunan" :validate-on-blur="!isFieldDirty">
            <FormItem>
                <FormLabel>Upload Foto Bangunan</FormLabel>
                <FormControl>
                    <Input type="file" @change="handleFileChange" accept=".png, .jpg" placeholder="Upload foto bangunan"
                        v-bind="componentField" />
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
        <FormField v-slot="{ componentField }" name="kategori_bangunan" :validate-on-blur="!isFieldDirty">
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
                                <SelectItem value="Ibadah">
                                    Bangunan Ibadah
                                </SelectItem>
                                <SelectItem value="Pemerintahan">
                                    Bangunan Desa/Pemerintahan
                                </SelectItem>
                                <SelectItem value="Pendidikan">
                                    Bangunan Pendidikan
                                </SelectItem>
                                <SelectItem value="Kesehatan">
                                    Bangunan Kesehatan
                                </SelectItem>
                                <SelectItem value="Usaha">
                                    Tempat Usaha/Bisnis
                                </SelectItem>
                                <SelectItem value="Olahraga">
                                    Tempat Olahraga
                                </SelectItem>
                                <SelectItem value="Keamanan">
                                    Pos Keamanan
                                </SelectItem>
                                <SelectItem value="Lainnya">
                                    Bangunan Lainnya
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
                Edit Bangunan
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