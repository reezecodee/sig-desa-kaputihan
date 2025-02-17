<script setup lang="ts">
import PublicBuildingCard from '@/Components/custom/landing/PublicBuildingCard.vue';

interface IPublicBuilding {
    delay: number,
    title: string,
    description: string,
    link: string,
    icon: string
}

const buildings: IPublicBuilding = [
    {
        delay: 100,
        title: 'Bangunan Ibadah',
        description: 'Desa Kaputihan memiliki beberapa bangunan ibadah yang menjadi pusat kegiatan keagamaan dan sosial bagi masyarakat setempat.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-mosque'
    },
    {
        delay: 200,
        title: 'Bangunan Desa/Pemerintahan',
        description: 'Desa Kaputihan memiliki beberapa bangunan desa atau pemerintahan yang berfungsi sebagai pusat administrasi dan pelayanan masyarakat.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building-columns'
    },
    {
        delay: 300,
        title: 'Bangunan Pendidikan',
        description: 'Desa Kaputihan memiliki sejumlah bangunan pendidikan yang menjadi pusat kegiatan belajar-mengajar bagi generasi muda.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-school'
    },
    {
        delay: 400,
        title: 'Bangunan Kesehatan',
        description: 'Desa Kaputihan memiliki fasilitas kesehatan yang bertujuan untuk memberikan pelayanan kesehatan yang optimal bagi masyarakat.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-hospital'
    },
    {
        delay: 100,
        title: 'Tempat Usaha/Bisnis',
        description: 'Desa Kaputihan memiliki berbagai tempat usaha dan pusat bisnis yang mendukung perekonomian lokal seperti pasar atau kegiatan usaha milik warga.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-cart-shopping'
    },
    {
        delay: 200,
        title: 'Tempat Olahraga',
        description: 'Desa Kaputihan memiliki beberapa fasilitas olahraga yang digunakan untuk mendukung kesehatan dan kebugaran masyarakat.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building'
    },
    {
        delay: 300,
        title: 'Pos Keamanan',
        description: 'Desa Kaputihan memiliki beberapa pos keamanan yang berfungsi untuk menjaga ketertiban dan keamanan lingkungan.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building-shield'
    },
    {
        delay: 400,
        title: 'Bangunan Lainnya',
        description: 'Selain bangunan utama seperti fasilitas ibadah, pendidikan, kesehatan, dan keamanan, Desa Kaputihan juga memiliki bangunan lainnya yang mendukung aktivitas sosial.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building-circle-arrow-right'
    },
]
</script>

<template>
    <section id="bangunan" class="services section light-background">

        <div class="container section-title" data-aos="fade-up">
            <h2>Bangunan Umum</h2>
            <p>Desa Kaputihan mempunyai bangunan-bangunan umum yang menjadi bangunan vital desa</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <PublicBuildingCard v-for="building in buildings" :key="building.title" :delay="building.delay"
                    :title="building.title" :icon="building.icon" :description="building.description" :link="building.link" />
            </div>

        </div>

    </section>
</template>

<style scoped></style>