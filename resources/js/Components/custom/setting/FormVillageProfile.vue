<script setup lang="ts">
import {
    Card,
    CardContent,
    CardDescription,
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
import Textarea from '@/Components/ui/textarea/Textarea.vue'

interface VillageData {
    jumlah_penduduk: number;
    jumlah_dusun: number;
    jumlah_rt: number;
    jumlah_rw: number;
    suhu_rata_rata: string;
    lokasi_elevasi: string;
    luas_wilayah: string;
    alamat_desa: string;
}

const props = defineProps<{
    errors?: Record<string, string[]>,
    village: VillageData,
}>()

const formSchema = toTypedSchema(z.object({
    jumlah_penduduk: z.coerce.number({
        invalid_type_error: 'Input harus berupa angka.',
    }).min(1, 'Jumlah penduduk wajib diisi.'),
    jumlah_dusun: z.coerce.number({
        invalid_type_error: 'Input harus berupa angka.',
    }).min(1, 'Jumlah dusun wajib diisi.'),
    jumlah_rt: z.coerce.number({
        invalid_type_error: 'Input harus berupa angka.',
    }).min(1, 'Jumlah RT wajib diisi.'),
    jumlah_rw: z.coerce.number({
        invalid_type_error: 'Input harus berupa angka.',
    }).min(1, 'Jumlah RW wajib diisi.'),
    suhu_rata_rata: z.string().trim().min(1, 'Suhu rata-rata wajib diisi.'),
    lokasi_elevasi: z.string().trim().min(1, 'Lokasi elevasi wajib diisi.'),
    luas_wilayah: z.string().trim().min(1, 'Luas wilayah wajib diisi.'),
    alamat_desa: z.string().trim().min(1, 'Alamat desa wajib diisi.'),
}));

const { values, isFieldDirty, handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        jumlah_penduduk: props.village.jumlah_penduduk,
        jumlah_dusun: props.village.jumlah_dusun,
        jumlah_rt: props.village.jumlah_rt,
        jumlah_rw: props.village.jumlah_rw,
        suhu_rata_rata: props.village.suhu_rata_rata,
        lokasi_elevasi: props.village.lokasi_elevasi,
        luas_wilayah: props.village.luas_wilayah,
        alamat_desa: props.village.alamat_desa,
    },
})

const onSubmit = handleSubmit((values) => {
    router.post(route('admin.villageProfileUpdate'), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
})
</script>

<template>
    <Card class="shadow-md self-start">
        <CardHeader>
            <CardTitle class="text-xl font-bold">Data Profile Desa</CardTitle>
            <CardDescription class="text-gray-500">Lengkapi data berikut:</CardDescription>
        </CardHeader>
        <CardContent>
            <form class="space-y-4" @submit="onSubmit">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    <FormField v-slot="{ componentField }" name="jumlah_penduduk">
                        <FormItem>
                            <FormLabel>Jumlah Penduduk</FormLabel>
                            <FormControl>
                                <Input type="number" placeholder="Contoh: 7863" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="jumlah_dusun">
                        <FormItem>
                            <FormLabel>Jumlah Dusun</FormLabel>
                            <FormControl>
                                <Input type="number" placeholder="Contoh: 5" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="jumlah_rt">
                        <FormItem>
                            <FormLabel>Jumlah RT</FormLabel>
                            <FormControl>
                                <Input type="number" placeholder="Contoh: 31" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="jumlah_rw">
                        <FormItem>
                            <FormLabel>Jumlah RW</FormLabel>
                            <FormControl>
                                <Input type="number" placeholder="Contoh: 14" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <FormField v-slot="{ componentField }" name="suhu_rata_rata">
                        <FormItem>
                            <FormLabel>Suhu Rata-rata</FormLabel>
                            <FormControl>
                                <Input type="text" placeholder="Contoh: 27 s.d 30" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="lokasi_elevasi">
                        <FormItem>
                            <FormLabel>Lokasi Elevasi</FormLabel>
                            <FormControl>
                                <Input type="text" placeholder="Contoh: 500-700 mdpl" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                    <FormField v-slot="{ componentField }" name="luas_wilayah">
                        <FormItem>
                            <FormLabel>Luas Wilayah</FormLabel>
                            <FormControl>
                                <Input type="text" placeholder="Contoh: 806 Hektar" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>
                </div>

                <FormField v-slot="{ componentField }" name="alamat_desa">
                    <FormItem>
                        <FormLabel>Alamat Desa</FormLabel>
                        <FormControl>
                            <Textarea placeholder="Masukkan alamat lengkap desa..." class="resize-none"
                                v-bind="componentField" />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <div class="flex justify-end">
                    <Button class="shadcn-btn edit-btn" type="submit">
                        Simpan Perubahan
                    </Button>
                </div>
            </form>
        </CardContent>
    </Card>
</template>

<style scoped></style>
