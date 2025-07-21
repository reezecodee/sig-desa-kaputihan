<script setup>
import { Head } from '@inertiajs/vue3';
import LandingV2 from '@/Layouts/LandingV2.vue';
import NightiangleChart from '@/Pages/LandingV2/StatisticVillage/charts/NightiangleChart.vue';
import PieChart from '@/Pages/LandingV2/StatisticVillage/charts/PieChart.vue';
import BarChart from '@/Pages/LandingV2/StatisticVillage/charts/BarChart.vue';
import WorldPopulationChart from '@/Pages/LandingV2/StatisticVillage/charts/WorldPopulationChart.vue';
import StackedLineChart from '@/Pages/LandingV2/StatisticVillage/charts/StackedLineChart.vue';

defineProps({
    title: String
});
</script>

<template>

    <Head :title="title" />
    <LandingV2>
        <section class="services__v3 section" id="home">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Statistik
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Statistik Desa Kaputihan
                        </h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4">
                        <BarChart title="Sarana Pendidikan" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <BarChart title="Tenaga Pengajar" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <BarChart title="Sarana Kesehatan" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <BarChart title="Sarana dan Prasaran lain" :endpoint="'/test'" />
                    </div>
                </div>

                <div class="mb-5">
                    <NightiangleChart title="Mata Pencaharian Penduduk" :endpoint="'/test'" />
                </div>
                <br>

                <div class="row mb-5">
                    <div class="col-12 col-lg-6 mb-4">
                        <PieChart title="Potensi Penduduk" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <PieChart title="Pendidikan Penduduk" :endpoint="'/test'" />
                    </div>
                </div>
                <br>

                <div class="row mb-5">
                    <div class="col-12 col-lg-6 mb-4">
                        <StackedLineChart title="Penduduk yang Pindah dan Datang" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <StackedLineChart title="Penduduk Berdasarkan Mata Pencaharian" :endpoint="'/test'" />
                    </div>
                </div>
                <br>

                <div class="row mb-5">
                    <div class="col-12 col-lg-6 mb-4">
                        <WorldPopulationChart title="Data Penduduk Berdasarkan Jenis Kelamin" :endpoint="'/test'" />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <WorldPopulationChart title="Kelompok Penduduk Berdasarkan Umur" :endpoint="'/test'" />
                    </div>
                </div>
                <br>
            </div>
        </section>
    </LandingV2>
</template>