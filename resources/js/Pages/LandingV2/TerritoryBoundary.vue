<script setup lang="ts">
import LandingV2 from '@/Layouts/LandingV2.vue';
import MapVillage from '@/Components/customv2/MapVillage.vue';
</script>

<template>
    <LandingV2>
        <section class="services__v3 section" id="home">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3"
                            data-aos="fade-up" data-aos-delay="0">
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
    </LandingV2>
</template>