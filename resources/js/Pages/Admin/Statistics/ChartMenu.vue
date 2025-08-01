<script setup lang="ts">
import { BarChart, PieChart, LineChart, ChartBarIncreasing, ChevronRight } from 'lucide-vue-next'
import App from '@/Layouts/App.vue'
import { Head, Link, router } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';
import Button from '@/components/ui/button/Button.vue';
import { Input } from '@/Components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import { useForm } from 'vee-validate'
import * as z from 'zod'
import {
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/Components/ui/form'

const props = defineProps({
    title: String,
    id: String,
    survey: Object,
})

const formSchema = toTypedSchema(z.object({
    tahun_survey: z.number({
        required_error: "Tahun survey wajib diisi.",
        invalid_type_error: "Tahun survey harus berupa angka.",
    })
        .int({ message: 'Tahun survey harus berupa bilangan bulat.' })
        .min(1000, { message: 'Tahun survey harus terdiri dari 4 digit.' })
        .max(9999, { message: 'Tahun survey harus terdiri dari 4 digit.' }),
}));

const { handleSubmit, setErrors } = useForm({
    validationSchema: formSchema,
    initialValues: {
        tahun_survey: props.survey.tahun_survey
    }
});

const onSubmit = handleSubmit((values) => {
    router.patch(route('admin.surveyUpdateYear', props.survey.id), values, {
        onError: (backendErrors) => {
            setErrors(backendErrors);
        }
    });
});
</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <Link :href="route('admin.statistics')">
                <Button class="shadcn-btn back-btn">
                    Kembali
                </Button>
                </Link>
            </div>
        </template>

        <Card>
            <CardHeader>
                <CardTitle>
                    Edit tahun survey.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <form @submit="onSubmit" id="add-schedule-form">
                    <FormField v-slot="{ componentField }" name="tahun_survey">
                        <FormItem>
                            <FormLabel>Tahun Survey</FormLabel>
                            <FormControl>
                                <Input type="number" placeholder="Contoh: 2025" v-bind="componentField" />
                            </FormControl>
                            <FormMessage />
                        </FormItem>
                    </FormField>

                    <div class="flex justify-end mt-4">
                        <Button type="submit" form="add-schedule-form" class="shadcn-btn edit-btn">Edit Tahun</Button>
                    </div>
                </form>
            </CardContent>
        </Card>

        <Card>
            <CardHeader>
                <CardTitle>
                    Masukkan data dengan lengkap pada setiap menu chart dibawah ini.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div>
                    <h3 class="font-semibold mb-2">Sarana dan Prasarana</h3>
                    <Link :href="route('admin.chart.facility', {
                        surveyID: id,
                        category: 'Sarana Pendidikan'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                        <div class="flex-shrink-0">
                            <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-sky-900 dark:text-sky-200">Sarana Pendidikan</div>
                            <div class="text-sm text-sky-700 dark:text-sky-400">
                                Grafik statistik untuk sarana pendidikan.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('admin.chart.facility', {
                        surveyID: id,
                        category: 'Tenaga Pengajar'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                        <div class="flex-shrink-0">
                            <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-sky-900 dark:text-sky-200">Tenaga Pengajar</div>
                            <div class="text-sm text-sky-700 dark:text-sky-400">
                                Grafik statistik untuk tenaga pengajar.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('admin.chart.facility', {
                        surveyID: id,
                        category: 'Sarana Kesehatan'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                        <div class="flex-shrink-0">
                            <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-sky-900 dark:text-sky-200">Sarana Kesahatan</div>
                            <div class="text-sm text-sky-700 dark:text-sky-400">
                                Grafik statistik untuk sarana kesehatan.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('admin.chart.facility', {
                        surveyID: id,
                        category: 'Sarana dan Prasarana Lain'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                        <div class="flex-shrink-0">
                            <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-sky-900 dark:text-sky-200">Sarana dan Prasarana Lain</div>
                            <div class="text-sm text-sky-700 dark:text-sky-400">
                                Grafik statistik untuk sarana dan prasarana lainnya.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Mata Pencaharian</h3>
                    <Link :href="route('admin.chart.occupation', id)">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-amber-100 dark:bg-amber-950 transition-colors hover:bg-amber-200 dark:hover:bg-amber-900 mb-3">
                        <div class="flex-shrink-0">
                            <PieChart class="h-8 w-8 text-amber-600 dark:text-amber-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-amber-900 dark:text-amber-200">Mata Pencaharian Utama
                                Penduduk</div>
                            <div class="text-sm text-amber-700 dark:text-amber-400">
                                Grafik statistik untuk mata pencaharian.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-amber-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Data Umum</h3>
                    <Link :href="route('admin.chart.generalData', {
                        surveyID: id,
                        category: 'Potensi Penduduk'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-green-100 dark:bg-green-950 transition-colors hover:bg-green-200 dark:hover:bg-green-900 mb-3">
                        <div class="flex-shrink-0">
                            <PieChart class="h-8 w-8 text-green-600 dark:text-green-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-green-900 dark:text-green-200">Potensi Penduduk</div>
                            <div class="text-sm text-green-700 dark:text-green-400">
                                Data umum potensi penduduk.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-green-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('admin.chart.generalData', {
                        surveyID: id,
                        category: 'Pendidikan Penduduk'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-green-100 dark:bg-green-950 transition-colors hover:bg-green-200 dark:hover:bg-green-900 mb-3">
                        <div class="flex-shrink-0">
                            <PieChart class="h-8 w-8 text-green-600 dark:text-green-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-green-900 dark:text-green-200">Pendidkan Penduduk</div>
                            <div class="text-sm text-green-700 dark:text-green-400">
                                Data umum pendidikan penduduk.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-green-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Kategori Penduduk</h3>
                    <Link :href="route('admin.chart.populationCategory', {
                        surveyID: id,
                        category: 'Berdasarkan yang Pindah dan Datang'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-red-100 dark:bg-red-950 transition-colors hover:bg-red-200 dark:hover:bg-red-900 mb-3">
                        <div class="flex-shrink-0">
                            <LineChart class="h-8 w-8 text-red-600 dark:text-red-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-red-900 dark:text-red-200">Penduduk yang Pindah dan Datang
                            </div>
                            <div class="text-sm text-red-700 dark:text-red-400">
                                Kategori penduduk yang pindah dan datang.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-red-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                    <Link :href="route('admin.chart.populationCategory', {
                        surveyID: id,
                        category: 'Berdasarkan Mata Pencaharian'
                    })">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-red-100 dark:bg-red-950 transition-colors hover:bg-red-200 dark:hover:bg-red-900 mb-3">
                        <div class="flex-shrink-0">
                            <LineChart class="h-8 w-8 text-red-600 dark:text-red-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-red-900 dark:text-red-200">Penduduk Berdasarkan Mata
                                Pencaharian
                            </div>
                            <div class="text-sm text-red-700 dark:text-red-400">
                                Kategori mata pencaharian penduduk.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-red-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Kelompok Penduduk</h3>
                    <Link :href="route('admin.chart.populationGroup', id)">
                    <div
                        class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-blue-100 dark:bg-blue-950 transition-colors hover:bg-blue-200 dark:hover:bg-blue-900 mb-3">
                        <div class="flex-shrink-0">
                            <ChartBarIncreasing class="h-8 w-8 text-blue-600 dark:text-blue-400" />
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-blue-900 dark:text-blue-200">Kelompok Penduduk Berdasarkan
                                Umur
                            </div>
                            <div class="text-sm text-blue-700 dark:text-blue-400">
                                Kelompok penduduk yang dikategorikan berdasarkan umur.
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <ChevronRight
                                class="h-5 w-5 text-blue-600 opacity-0 transition-opacity group-hover:opacity-100" />
                        </div>
                    </div>
                    </Link>
                </div>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>