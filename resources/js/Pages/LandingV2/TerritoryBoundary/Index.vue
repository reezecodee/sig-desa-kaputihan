<script setup>
import { Head } from '@inertiajs/vue3'
import LandingV2 from '@/Layouts/LandingV2.vue';
import MapVillage from '@/Components/customv2/MapVillage.vue';

defineProps({
    title: String
})
</script>

<template>

    <Head :title="title" />
    <LandingV2>
        <section class="services__v3 section" id="map-interactive">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Peta Wilayah
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Peta Batas Wilayah Desa Kaputihan
                        </h2>
                    </div>
                </div>
                <MapVillage :height="900" />
            </div>
        </section>

        <section class="services__v3 section" id="static-map">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Peta Dusun dan RT/RW
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Peta Batas Dusun dan RT/RW Desa Kaputihan
                        </h2>
                    </div>
                </div>
                <div>
                    <img src="/placeholder/batas-dusun-rt-rw.jpg" class="img-fluid" alt="" srcset="">
                </div>
            </div>
        </section>
    </LandingV2>
</template>