<script setup lang="ts">
import { onMounted, inject } from 'vue'

const props = inject('props');
const building = props?.buildings?.value;

onMounted(() => {
  new PureCounter({
    selector: '.purecounter',
    start: 0,
    end: 500,
    duration: 2,
  })
})
</script>

<template>
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['ibadah']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Tempat Ibadah</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['pemerintahan']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bangunan Desa/Pemerintahan</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['pendidikan']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bangunan Pendidikan</p>
                    </div>
                </div><!-- End Stats Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['kesehatan']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bangunan Kesehatan</p>
                    </div>
                </div><!-- End Stats Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['usaha']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Tempat Usaha/Bisnis</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['olahraga']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Tempat Olahraga</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['keamanan']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Pos Keamanan</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" :data-purecounter-end="building['lainnya']" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bangunan Lainnya</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section>
</template>

<style scoped></style>