<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

let loading = ref(false);
let categories = ref([]);
let currentPage = ref(1);
const endpoint = route('landing.buildingCategories');
let hasMorePages = ref(true);
const icon = '<i class="bi bi-arrow-right-circle-fill"></i>'

const getCategories = async () => {
    loading.value = true;

    try {
        const response = await axios.get(`${endpoint}?page=${currentPage.value}`);
        categories.value.push(...response.data.data);
        hasMorePages.value = response.data.next_page_url !== null;
    } catch (error) {
        console.error("Gagal mengambil data dari API:", error);
    } finally {
        loading.value = false;
    }
}

onMounted(() => {
    getCategories();
})

const seeMoreCategories = () => {
    currentPage.value += 1;
    getCategories();
}
</script>

<template>
    <section class="section services__v3" id="building-category">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                        data-aos-delay="0">Bangunan</span>
                    <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Kami memiliki bangunan-bangunan vital yang
                        menjadi pondasi desa</h2>
                </div>
            </div>
            <div class="row g-4">
                <div v-for="item in categories" :key="item.id" class="col-md-6 col-lg-4" data-aos="fade-up"
                    data-aos-delay="0">
                    <div class="service-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between gap-5">
                        <div>
                            <div class="fs-1 mb-2 text-success" v-html="item.icon">
                            </div>
                            <h3 class="fs-5 mb-3">{{ item.nama_kategori }}</h3>
                            <p>
                                {{ item.deskripsi }}
                            </p>
                            <p class="fw-bold">Jumlah: 10</p>
                        </div>
                        <Link class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                            :href="item.id">
                        <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                        </span>
                        <span>Lihat Bangunan</span>
                        </Link>
                    </div>
                </div>
            </div>
            <div v-if="hasMorePages" class="d-flex justify-content-center mt-5">
                <button @click="seeMoreCategories" class="btn btn-md btn-outline-primary"
                    v-html="loading ? 'Sedang memuat data...' : `Lihat lainnya ${icon}`">
                </button>
            </div>
        </div>
    </section>
</template>