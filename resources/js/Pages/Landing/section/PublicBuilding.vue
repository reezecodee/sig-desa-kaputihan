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
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-mosque'
    },
    {
        delay: 200,
        title: 'Bangunan Desa/Pemerintahan',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building-columns'
    },
    {
        delay: 300,
        title: 'Bangunan Pendidikan',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-school'
    },
    {
        delay: 400,
        title: 'Bangunan Kesehatan',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-hospital'
    },
    {
        delay: 100,
        title: 'Tempat Usaha/Bisnis',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-cart-shopping'
    },
    {
        delay: 200,
        title: 'Tempat Olahraga',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building'
    },
    {
        delay: 300,
        title: 'Pos Keamanan',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
        link: route('landing.buildingList'),
        icon: 'fa-solid fa-building-shield'
    },
    {
        delay: 400,
        title: 'Bangunan Lainnya',
        description: 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
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