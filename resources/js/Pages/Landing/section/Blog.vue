<script setup lang="ts">
import { inject } from 'vue'

const blog = inject('blog')
</script>

<template>
    <section id="blog" class="service-details section mt-5">

        <div class="container">

            <div class="row gy-5">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                    <div class="service-box">
                        <h4>Penulis</h4>
                        <div class="services-list">
                            <span>Admin Desa
                                Kaputihan</span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div style="width: 100%; aspect-ratio: 16 / 9; overflow: hidden;">
                        <img :src="blog.thumbnail ? `/storage/${blog.thumbnail}` : '/placeholder/blog.svg'" alt=""
                            class="img-fluid services-img" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 class="mt-4">{{ blog.judul }}
                    </h3>
                    <p>
                        {{ blog.konten }}
                    </p>
                </div>

            </div>

        </div>

    </section>
</template>

<style scoped></style>