<script setup lang="ts">
import { Button } from '@/Components/ui/button'
import { BarChart, ChevronRight } from 'lucide-vue-next'
import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3'
import { Card, CardHeader, CardContent, CardTitle } from '@/Components/ui/card';

defineProps({
    title: String
})

</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
        </template>

        <Card>
            <CardHeader>
                <CardTitle>
                    Masukkan data dengan lengkap pada setiap menu chart dibawah ini.
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                    <div class="flex-shrink-0">
                        <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                    </div>
                    <div class="flex-1">
                        <div class="font-semibold text-sky-900 dark:text-sky-200">Statistik Penduduk</div>
                        <div class="text-sm text-sky-700 dark:text-sky-400">
                            Lihat grafik data kependudukan per wilayah.
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <ChevronRight
                            class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                    </div>
                </div>
                <div class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                    <div class="flex-shrink-0">
                        <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                    </div>
                    <div class="flex-1">
                        <div class="font-semibold text-sky-900 dark:text-sky-200">Statistik Penduduk</div>
                        <div class="text-sm text-sky-700 dark:text-sky-400">
                            Lihat grafik data kependudukan per wilayah.
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <ChevronRight
                            class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                    </div>
                </div>
                <div class="group flex cursor-pointer items-center gap-4 rounded-lg p-4  bg-sky-100 dark:bg-sky-950 transition-colors hover:bg-sky-200 dark:hover:bg-sky-900 mb-3">
                    <div class="flex-shrink-0">
                        <BarChart class="h-8 w-8 text-sky-600 dark:text-sky-400" />
                    </div>
                    <div class="flex-1">
                        <div class="font-semibold text-sky-900 dark:text-sky-200">Statistik Penduduk</div>
                        <div class="text-sm text-sky-700 dark:text-sky-400">
                            Lihat grafik data kependudukan per wilayah.
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <ChevronRight
                            class="h-5 w-5 text-sky-600 opacity-0 transition-opacity group-hover:opacity-100" />
                    </div>
                </div>
            </CardContent>
        </Card>
    </App>
</template>

<style scoped></style>