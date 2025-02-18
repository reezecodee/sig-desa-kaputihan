<script setup lang="ts">
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/Components/ui/card'
import { Button } from '@/Components/ui/button'
import { router } from '@inertiajs/vue3'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'
import { RadioGroup, RadioGroupItem } from '@/Components/ui/radio-group'
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import { ref, onBeforeUnmount, inject } from 'vue'

const props = defineProps<{
    errors: Record<string, string[]>
}>()

const village = inject('village')
const previewKepdes = ref<string | null>(village.foto ? `${village.foto}` : null)
const previewLogo = ref<string | null>(village.logo ? `${village.logo}` : null)

onBeforeUnmount(() => {
    if (previewKepdes.value || previewLogo.value) {
        URL.revokeObjectURL(previewKepdes.value)
        URL.revokeObjectURL(previewLogo.value)
    }
})

const formSchema = toTypedSchema(z.object({
    nama_kades: z.string({ message: 'Nama kepala desa wajib di isi' })
        .max(255, { message: 'Nama kepala desa tidak boleh lebih dari 255 karakter' })
        .trim(),
    periode: z.string({ message: 'Periode kepala desa wajib di isi' })
        .max(255, { message: 'Periode tidak boleh lebih dari 255 karakter' })
        .trim(),
    jumlah_penduduk: z.string({ message: 'Jumlah penduduk desa wajib di isi' })
        .max(255, { message: 'jumlah penduduk tidak boleh lebih dari 255 karakter' })
        .trim(),
    foto: z.union([
        z.instanceof(File).refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
        z.null()
    ]),
    nama_aplikasi: z.string({ message: 'Nama aplikasi wajib di isi' })
        .max(255, { message: 'Nama aplikasi tidak boleh lebih dari 255 karakter' })
        .trim(),
    logo: z.union([
        z.instanceof(File).refine(file => file.size < 5 * 1024 * 1024, {
            message: 'Ukuran file maksimal 5MB'
        }),
        z.null()
    ]),
    logo_aktif: z.enum(['On', 'Off'], { message: 'Status keaktifan logo wajib di isi' }),
    telepon: z.string({ message: 'Nomor Telepon desa wajib di isi' })
        .max(255, { message: 'Nomor telepon tidak boleh lebih dari 255 karakter' })
        .trim(),
    email: z.string({ message: 'Email desa wajib di isi' })
        .max(255, { message: 'Email tidak boleh lebih dari 255 karakter' })
        .trim(),
}))

const { values, isFieldDirty, handleSubmit, setErrors, setFieldValue } = useForm({
    validationSchema: formSchema,
    initialValues: {
        nama_kades: village.nama_kades,
        periode: village.periode,
        jumlah_penduduk: village.jumlah_penduduk,
        foto: null,
        nama_aplikasi: village.nama_aplikasi,
        logo: null,
        logo_aktif: village.logo_aktif,
        telepon: village.telepon,
        email: village.email
    },
})

const handleFileChange = (type: string, event: Event) => {
    const target = event.target as HTMLInputElement
    const file = target.files?.[0] ?? null

    if (file) {
        if (type === 'foto') {
            previewKepdes.value = URL.createObjectURL(file)
            setFieldValue('foto', file)
        } else {
            previewLogo.value = URL.createObjectURL(file)
            setFieldValue('logo', file)
        }
    } else {
        if (type === 'foto') {
            previewKepdes.value = 'null'
            setFieldValue('foto', 'null')
        } else {
            previewLogo.value = 'null'
            setFieldValue('logo', 'null')
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
                        <CardTitle class="text-xl font-bold">Kepala Desa Kaputihan</CardTitle>
                        <CardDescription class="text-gray-500">Periode {{ values.periode }}</CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div class="w-full flex justify-center">
                            <img :src="previewKepdes ?? ''" alt="Gambar" class="w-48 h-auto rounded-md">
                        </div>
                        <p class="text-center text-gray-700 font-medium text-sm mt-2">{{ values.nama_kades }}</p>
                    </CardContent>
                </Card>
                <Card class="shadow-md">
                    <CardHeader>
                        <CardTitle class="text-xl font-bold">Logo Aplikasi</CardTitle>
                        <CardDescription class="text-gray-500">Logo aplikasi: {{ values.logo_aktif == 'On' ?
                            'Ditampilkan' : 'Disembunyikan' }}</CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div class="w-full flex justify-center">
                            <img :src="previewLogo ?? ''" alt="Gambar" class="w-48 h-auto rounded-md">
                        </div>
                        <p class="text-center text-gray-700 font-medium text-sm mt-2">Logo Aplikasi</p>
                    </CardContent>
                </Card>
            </div>

            <Card class="shadow-md self-start">
                <CardHeader>
                    <CardTitle class="text-xl font-bold">Data Kepala Desa</CardTitle>
                    <CardDescription class="text-gray-500">Masukkan data berikut:</CardDescription>
                </CardHeader>
                <CardContent>
                    <FormField v-slot="{ componentField }" name="foto" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Upload Foto Kepala Desa</FormLabel>
                            <FormControl>
                                <Input type="file" @change="(event) => handleFileChange('foto', event)"
                                    accept=".png, .jpg" placeholder="Upload foto" v-bind="componentField"
                                    :key="fileInputKey" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
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
                    <FormField v-slot="{ componentField }" name="periode" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Periode Kepala Desa</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan periode kepala desa"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="jumlah_penduduk" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Jumlah Penduduk</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan jumlah penduduk desa desa"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </CardContent>
                <CardHeader>
                    <CardTitle class="text-xl font-bold">Data Aplikasi</CardTitle>
                    <CardDescription class="text-gray-500">Masukkan data berikut:</CardDescription>
                </CardHeader>
                <CardContent>
                    <FormField v-slot="{ componentField }" name="logo" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Upload Logo Aplikasi</FormLabel>
                            <FormControl>
                                <Input type="file" @change="(event) => handleFileChange('logo', event)"
                                    accept=".png, .jpg" placeholder="Upload logo" v-bind="componentField"
                                    :key="fileInputKey" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="nama_aplikasi" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Nama Aplikasi (gunakan singkatan)</FormLabel>
                            <FormControl>
                                <Input type="text" autocomplete="off" placeholder="Masukkan nama aplikasi ini"
                                    v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="logo_aktif" :validate-on-blur="!isFieldDirty">
                        <FormItem>
                            <FormLabel>Aktifkan logo?</FormLabel>
                            <FormControl>
                                <RadioGroup :orientation="'vertical'" v-bind="componentField">
                                    <div class="flex items-center space-x-2">
                                        <RadioGroupItem id="r1" value="On" />
                                        <Label for="r1">Ya</Label>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <RadioGroupItem id="r2" value="Off" />
                                        <Label for="r2">Tidak</Label>
                                    </div>
                                </RadioGroup>
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </CardContent>
                <CardHeader>
                    <CardTitle class="text-xl font-bold">Data Kontak Desa</CardTitle>
                    <CardDescription class="text-gray-500">Masukkan data berikut:</CardDescription>
                </CardHeader>
                <CardContent>
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
                    <Button>Perbarui Data</Button>
                </CardFooter>
            </Card>
        </div>
    </form>
</template>



<style scoped></style>