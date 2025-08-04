<script setup>
import LandingV2 from '@/Layouts/LandingV2.vue';
import { Head, router, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import debounce from 'lodash/debounce';
import Pagination from '@/Components/customv2/Pagination.vue';

const props = defineProps({
    title: String,
    buildings: Object,
    filters: Object
});

let search = ref(props.filters.search);

watch(search, debounce(value => {
    router.get(route('landing.buildings'), { search: value }, {
        preserveState: true,
        replace: true
    })
}, 300));

function cropText(text, limit) {
    if (text.length > limit) {
        return text.substring(0, limit) + '...';
    }

    return text;
}
</script>

<template>

    <Head :title="title" />
    <LandingV2>
        <section class="services__v3 section" id="home">
            <div class="container">
                <div class="row mb-5 mt-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                            Bangunan
                        </span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            Bangunan di Desa Kaputihan
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" id="searchInput" class="form-control form-control-lg" v-model="search"
                                autocomplete="off" placeholder="Cari nama atau kategori bangunan...">
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6" v-for="building in buildings.data" :key="building.id">
                        <div class="card h-100">
                            <img :src="`/storage/foto-bangunan/${building.foto_bangunan}`" class="card-img-top"
                                :alt="`Foto ${building.nama_bangunan}`">
                            <div class="card-body d-flex flex-column">
                                <div>
                                    <span class="badge rounded-pill text-bg-primary mb-2">{{
                                        building.category?.nama_kategori }}</span>
                                </div>
                                <h5 class="card-title">{{ building.nama_bangunan }}</h5>
                                <p class="card-text">{{ cropText(building.deskripsi, 130) }}</p>
                                <Link :href="route('landing.detailBuilding', building.slug)"
                                    class="btn btn-primary mt-auto">Lihat Detail</Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" v-if="buildings.data.length > 0">
                    <div class="col-12 d-flex justify-content-center">
                        <Pagination :links="buildings.links" />
                    </div>
                </div>
            </div>
        </section>
    </LandingV2>
</template>

<style scoped>
.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}
</style>