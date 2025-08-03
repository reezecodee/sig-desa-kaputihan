<script setup lang="ts">
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/Components/ui/card'
import Button from '@/components/ui/button/Button.vue'
import { router } from '@inertiajs/vue3'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { ref, onBeforeUnmount } from 'vue'
import Textarea from '@/Components/ui/textarea/Textarea.vue'

const props = defineProps<{
    errors?: Record<string, string[]>,
    setting: Record<string, string>
}>()

const previewLogo = ref<string>(props.setting.logo ? `/storage/${props.setting.logo}` : '/placeholder/logo-desa.webp')
const previewOrganisasi = ref<string>(props.setting.foto_organisasi ? `/storage/${props.setting.foto_organisasi}` : '/placeholder/organisasi.png')

onBeforeUnmount(() => {
    if (previewOrganisasi.value || previewLogo.value) {
        URL.revokeObjectURL(previewLogo.value)
        URL.revokeObjectURL(previewOrganisasi.value)
    }
})

const formSchema = toTypedSchema(z.object({
    nama_kades: z.string({ message: 'Nama kepala desa wajib di isi' })
        .max(255, { message: 'Nama kepala desa tidak boleh lebih dari 255 karakter' })
        .trim(),
    periode: z.string({ message: 'Periode kepala desa wajib di isi' })
        .max(255, { message: 'Periode tidak boleh lebih dari 255 karakter' })
        .trim(),
    pesan_kades: z.string().trim().min(1, 'Pesan kepala desa wajib diisi.'),
    logo: z.union([
        z.instanceof(File).refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
        z.null()
    ]),
    telepon: z.string({ message: 'Nomor Telepon desa wajib di isi' })
        .max(255, { message: 'Nomor telepon tidak boleh lebih dari 255 karakter' })
        .trim(),
    email: z.string({ message: 'Email desa wajib di isi' })
        .max(255, { message: 'Email tidak boleh lebih dari 255 karakter' })
        .trim(),
    foto_organisasi: z.union([
        z.instanceof(File).refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
        z.null()
    ]),
}))

const { values, isFieldDirty, handleSubmit, setErrors, setFieldValue } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_kades: props.setting.nama_kades,
        periode: props.setting.periode,
        pesan_kades: props.setting.pesan_kades,
        logo: null,
        telepon: props.setting.telepon,
        email: props.setting.email,
        foto_organisasi: null,
    },
})

const handleFileChange = (type: string, event: Event) => {
    const target = event.target as HTMLInputElement
    const file = target.files?.[0] ?? null

    if (file) {
        if (type === 'logo') {
            previewLogo.value = URL.createObjectURL(file)
            setFieldValue('logo', file)
        } else if (type === 'foto_organisasi') {
            previewOrganisasi.value = URL.createObjectURL(file)
            setFieldValue('foto_organisasi', file)
        }
    } else {
        if (type === 'logo') {
            previewLogo.value = null
            setFieldValue('logo', null)
        } else if (type === 'foto_organisasi') {
            previewOrganisasi.value = null
            setFieldValue('foto_organisasi', null)
        }
    }
}

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.settingUpdate'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
})
</script>

<template>
    <form @submit="onSubmit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="self-start">
                <Card class="shadow-md mb-7">
                    <CardHeader>
                        <CardTitle class="text-xl font-bold">Logo Aplikasi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div class="w-full flex justify-center">
                            <img :src="previewLogo ?? ''" alt="Gambar" class="w-48 h-auto rounded-md">
                        </div>
                        <p class="text-center text-gray-700 font-medium text-sm mt-2">Logo Aplikasi</p>
                    </CardContent>
                </Card>
                <Card class="shadow-md">
                    <CardHeader>
                        <CardTitle class="text-xl font-bold">Struktur Organisasi</CardTitle>
                        <CardDescription class="text-gray-500">Struktur organisasi saat ini</CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div class="w-full flex justify-center">
                            <img :src="previewOrganisasi ?? ''" alt="Gambar" class="w-48 h-auto rounded-md">
                        </div>
                        <p class="text-center text-gray-700 font-medium text-sm mt-2">Struktur Organisasi</p>
                    </CardContent>
                </Card>
            </div>

            <Card class="shadow-md self-start">
                <CardHeader>
                    <CardTitle class="text-xl font-bold">Data Aplikasi</CardTitle>
                    <CardDescription class="text-gray-500">Masukkan data berikut:</CardDescription>
                </CardHeader>
                <CardContent>
                    <FormField v-slot="{ componentField }" name="logo" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Upload Logo Aplikasi</FormLabel>
                            <br>
                            <FormControl>
                                <input type="file" @change="(event) => handleFileChange('logo', event)"
                                    accept=".png, .jpg" placeholder="Upload logo" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <br>
                    <FormField v-slot="{ componentField }" name="nama_kades" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Nama Kepala Desa</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan nama kepala desa"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <br>
                    <FormField v-slot="{ componentField }" name="periode" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Periode Kepala Desa</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Contoh: 2025 - 2030"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <br>
                    <FormField v-slot="{ componentField }" name="pesan_kades" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Pesan Kepala Desa</FormLabel>
                            <FormControl>
                                <Textarea placeholder="Masukan pesan kepala desa" class="resize-none"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </CardContent>
                <CardHeader>
                    <CardTitle class="text-xl font-bold">Data Organisasi & Kontak Desa</CardTitle>
                    <CardDescription class="text-gray-500">Masukkan data berikut:</CardDescription>
                </CardHeader>
                <CardContent>
                    <FormField v-slot="{ componentField }" name="foto_organisasi" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Upload Struktur Organisasi Desa</FormLabel>
                            <FormControl>
                                <input type="file" @change="(event) => handleFileChange('foto_organisasi', event)"
                                    accept=".png, .jpg" placeholder="Upload foto organisasi" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <br>
                    <FormField v-slot="{ componentField }" name="email" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Email Desa</FormLabel>
                            <FormControl>
                                <Input type="email" autocomplete="off" placeholder="Masukkan email desa"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <br>
                    <FormField v-slot="{ componentField }" name="telepon" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Telepon Desa</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan telepon desa"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </CardContent>
                <CardFooter class="text-right">
                    <Button type="submit" class="shadcn-btn edit-btn">Perbarui Pengaturan</Button>
                </CardFooter>
            </Card>
        </div>
    </form>
</template>



<style scoped></style>