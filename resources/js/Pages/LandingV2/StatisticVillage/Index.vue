<script setup>
import { Head } from '@inertiajs/vue3';
import LandingV2 from '@/Layouts/LandingV2.vue';
import PieChart from '@/Pages/LandingV2/StatisticVillage/charts/PieChart.vue';
import BarChart from '@/Pages/LandingV2/StatisticVillage/charts/BarChart.vue';
import WorldPopulationChart from '@/Pages/LandingV2/StatisticVillage/charts/WorldPopulationChart.vue';
import StackedLineChart from '@/Pages/LandingV2/StatisticVillage/charts/StackedLineChart.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';

defineProps({
    title: String
});

let chartsData = ref([]);

onMounted(async () => {
    try {
        let response = await axios.get('/charts');
        chartsData.value = response.data;
    } catch (e) {
        console.error("Terjadi error saat fetch data:", e);
    }
});
</script>

<template>

    <Head>
        <title>{{ title }}</title>
        <meta name="description"
            content="Informasi grafik statistik desa kaputihan dalam bentuk chart interaktif">
    </Head>
    <LandingV2>
        <section class="services__v3 section" id="home">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Statistik
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Statistik Desa Kaputihan {{ chartsData.surveyYear ? `Survey ${chartsData.surveyYear}` : ''
                            }}
                        </h2>
                    </div>
                </div>

                <div v-if="chartsData.surveyYear">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <BarChart v-if="chartsData.educationalFacilities" title="Sarana Pendidikan"
                                :data="chartsData.educationalFacilities" />
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <BarChart v-if="chartsData.educators" title="Tenaga Pengajar"
                                :data="chartsData.educators" />
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <BarChart v-if="chartsData.healthFacilities" title="Sarana Kesehatan"
                                :data="chartsData.healthFacilities" />
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <BarChart v-if="chartsData.otherFacilities" title="Sarana dan Prasaran lain"
                                :data="chartsData.otherFacilities" />
                        </div>
                    </div>

                    <div class="mb-5">
                        <PieChart v-if="chartsData.mainOccupations" title="Mata Pencaharian Penduduk"
                            :data="chartsData.mainOccupations" />
                    </div>
                    <br>

                    <div class="row mb-5">
                        <div class="col-12 col-lg-6 mb-4">
                            <PieChart v-if="chartsData.populationPotential" title="Potensi Penduduk"
                                :data="chartsData.populationPotential" />
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <PieChart v-if="chartsData.educationalAttainment" title="Pendidikan Penduduk"
                                :data="chartsData.educationalAttainment" />
                        </div>
                    </div>
                    <br>

                    <div class="row mb-5">
                        <div class="col-12 col-lg-6 mb-4">
                            <StackedLineChart v-if="chartsData.populationMigration"
                                title="Penduduk yang Pindah dan Datang" :data="chartsData.populationMigration" />
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <StackedLineChart v-if="chartsData.populationByOccupation"
                                title="Penduduk Berdasarkan Mata Pencaharian"
                                :data="chartsData.populationByOccupation" />
                        </div>
                    </div>
                    <br>

                    <div class="mb-5">
                        <WorldPopulationChart v-if="chartsData.populationByAgeGroup"
                            title="Kelompok Penduduk Berdasarkan Umur" :data="chartsData.populationByAgeGroup" />
                    </div>
                    <br>
                </div>
                <div v-else>
                    <p class="text-center">Data statistik tidak tersedia saat ini.</p>
                </div>
            </div>
        </section>
    </LandingV2>
</template>