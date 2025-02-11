<script setup lang="ts">
import App from '@/Layouts/App.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';
import { Card, CardContent, CardTitle, CardHeader } from '@/Components/ui/card'
import RespondForm from '@/Components/custom/complaint/RespondForm.vue'

defineProps({
    title: String
})

</script>

<template>

    <Head :title="title" />
    <App>
        <template #header>
            <h2 class="text-3xl font-bold tracking-tight">
                {{ title }}
            </h2>
            <div class="flex items-center space-x-2">
                <Link :href="route('admin.complaint')">
                <Button>Kembali</Button>
                </Link>
            </div>
        </template>
        <Card>
            <CardContent class="p-5">
                <div class="container-envelope w-full">
                    <div class="inner-envelope p-5">
                        <div class="text-start font-medium text-sm">
                            <p>Nama pengadu: Budi Ambasing</p>
                            <p>Status aduan: Menunggu</p>
                            <hr class="my-3">
                            <p>Pesan aduan:</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa asperiores, quis ex, nobis
                                fugit
                                minima cupiditate numquam sunt quo voluptatibus placeat, laboriosam pariatur autem sed.
                                Inventore quo modi numquam consectetur natus maiores voluptatem ullam adipisci velit
                                quibusdam
                                sequi error obcaecati quas, ab perferendis eum iusto tempora vitae laudantium veniam
                                sunt.</p>
                        </div>
                    </div>
                </div>
            </CardContent>
        </Card>
        <Card>
            <CardHeader>
                <CardTitle>
                    Lampiran File
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div class="flex flex-wrap gap-3">
                    <div class="text-center">
                        <img src="/placeholder/attachment.svg" width="100" alt="" srcset="" class="rounded-lg">
                        <span>asdasdasd.jpg</span>
                    </div>
                </div>
            </CardContent>
        </Card>
        <Card>
            <CardContent class="p-5">
                <RespondForm />
            </CardContent>
        </Card>
    </App>
</template>

<style scoped>
.container-envelope {
    margin: 0 auto;
    background-image: repeating-linear-gradient(135deg, #F29B91 0px, #F09290 30px, transparent 10px, transparent 50px, #83B3DB 50px, #84ADCB 80px, transparent 80px, transparent 100px);
    padding: 4px;
}

.container-envelope .inner-envelope {
    background: white;
    width: 100%;
    height: 100%;
}
</style>