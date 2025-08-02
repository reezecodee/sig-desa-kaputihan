<script setup lang="ts">
import { ref, onBeforeUnmount, onMounted } from 'vue';
import { Button } from '@/components/ui/button';
import { FormField, FormItem, FormMessage } from '@/Components/ui/form'; // Pastikan path konsisten
import { useForm } from 'vee-validate';
import { toTypedSchema } from '@vee-validate/zod';
import * as z from 'zod';
import { router } from '@inertiajs/vue3';
import { Trash2Icon } from 'lucide-vue-next';

// Definisikan tipe data untuk props
interface Photo {
    id: string;
    nama_file: string;
}

const props = defineProps<{
    initialBuildingPhotos: Photo[];
    buildingID: string;
}>();

// --- STATE MANAGEMENT ---
const buildingPhotos = ref<Photo[]>([]);
const previewUrls = ref<string[]>([]);
const fileInput = ref<HTMLInputElement | null>(null);
const isUploading = ref(false);

// Inisialisasi galeri saat komponen dimuat
onMounted(() => {
    // 1. PERBAIKAN: Tambahkan fallback jika props kosong untuk menghindari error
    buildingPhotos.value = props.initialBuildingPhotos || [];
});

// --- VALIDATION (Zod + VeeValidate) ---
const formSchema = toTypedSchema(z.object({
    images: z.any()
        .refine((files) => files && files.length > 0, 'Anda harus memilih setidaknya satu gambar.')
        .refine(
            (files) => files.every((file: File) => file.size <= 5 * 1024 * 1024),
            'Setiap file tidak boleh lebih dari 5MB.'
        ),
}));

const { handleSubmit, setFieldValue, setErrors, resetForm } = useForm({
    validationSchema: formSchema,
    initialValues: {
        images: undefined,
    }
});

// --- FILE HANDLING ---
function triggerFileInput() {
    console.log('Tombol "Pilih Gambar" diklik!');
    console.log('Isi dari fileInput ref:', fileInput.value);
    fileInput.value?.click();
}

function handleFileChange(event: Event) {
    const target = event.target as HTMLInputElement;
    const files = target.files ? Array.from(target.files) : [];
    setFieldValue('images', files);
    previewUrls.value.forEach(URL.revokeObjectURL);
    previewUrls.value = files.map((file) => URL.createObjectURL(file));
}

// --- FORM SUBMISSION ---
const onUpload = handleSubmit((values) => {
    router.post(route('admin.storeBuildingImages', props.buildingID), values, {
        // 2. PERBAIKAN: Tambahkan onStart dan onFinish untuk mengelola state loading
        onStart: () => { isUploading.value = true; },
        onError: (errors) => { setErrors(errors); },
        onSuccess: (page) => {
            const newPhotos = (page.props.flash as any)?.newPhotos as Photo[];
            if (newPhotos) {
                buildingPhotos.value.push(...newPhotos);
            }
            resetForm({ values: { images: undefined } });
            previewUrls.value.forEach(URL.revokeObjectURL);
            previewUrls.value = [];
        },
        onFinish: () => { isUploading.value = false; },
        preserveScroll: true,
    });
});

// Cleanup memory
onBeforeUnmount(() => {
    previewUrls.value.forEach(URL.revokeObjectURL);
});

function deletePhoto(photoId: string) {
    if (!confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
        return;
    }

    router.delete(route('admin.destroyBuildingImage', photoId), {
        onSuccess: () => {
            buildingPhotos.value = buildingPhotos.value.filter(p => p.id !== photoId);
        },
        onError: (errors) => {
            alert(errors.message || 'Gagal menghapus foto.');
        },
        preserveScroll: true,
    });
}
</script>

<template>
    <div class="space-y-6">
        <form class="w-full md:w-2/3" @submit.prevent="onUpload">
            <FormField name="images">
                <FormItem>
                    <div class="flex items-center space-x-4">
                        <label class="text-sm font-medium">Foto Bangunan</label>
                        <input type="file" ref="fileInput" multiple @change="handleFileChange"
                            accept="image/png, image/jpeg" class="hidden" />
                        <Button type="button" variant="outline" @click="triggerFileInput">
                            Pilih Gambar
                        </Button>
                        <Button type="submit" :disabled="isUploading">
                            <span v-if="isUploading" class="loading loading-spinner loading-xs mr-2"></span>
                            Unggah
                        </Button>
                    </div>
                    <FormMessage />
                </FormItem>
            </FormField>
        </form>

        <div v-if="previewUrls.length > 0" class="grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-6">
            <div v-for="(url, index) in previewUrls" :key="index"
                class="relative overflow-hidden rounded-md border aspect-square">
                <img :src="url" :alt="`Pratinjau ${index + 1}`" class="h-full w-full object-cover">
            </div>
        </div>

        <div class="mt-10">
            <h2 class="mb-4 text-xl font-semibold">Galeri Foto Bangunan</h2>
            <div v-if="buildingPhotos && buildingPhotos.length > 0"
                class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">

                <div v-for="photo in buildingPhotos" :key="photo.id"
                    class="group relative aspect-square overflow-hidden rounded-md shadow-md">

                    <img :src="`/storage/foto-bangunan/${photo.nama_file}`" class="h-full w-full object-cover">

                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 opacity-0 transition-all group-hover:bg-opacity-50 group-hover:opacity-100">
                        <Button variant="destructive" size="icon" @click="deletePhoto(photo.id)">
                            <Trash2Icon class="h-6 w-6 text-white" />
                        </Button>
                    </div>
                </div>
            </div>
            <div v-else class="flex justify-center rounded-md border-2 border-dashed p-12">
                <p class="text-muted-foreground">Foto bangunan tidak ditemukan.</p>
            </div>
        </div>
    </div>
</template>