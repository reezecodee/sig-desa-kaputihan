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
                        <NightiangleChart />
                    </div>

                    <div class="col-12 col-lg-6 mb-4">
                        <BarChart />
                    </div>

                    <div class="col-12 col-lg-6 mb-4">
                        <WorldPopulationChart />
                    </div>

                    <div class="col-12 col-lg-6 mb-4">
                        <PieChart />
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-lg-6 mb-4">
                        <StackedLineChart />
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <StackedLineChart />
                    </div>
                </div>
            </div>
        </section>
    </LandingV2>
</template>