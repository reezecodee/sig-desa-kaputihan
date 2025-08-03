<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    nama_pelapor: '',
    kontak_pelapor: '',
    judul_laporan: '',
    kategori_laporan: '',
    pesan_laporan: '',
    'g-recaptcha-response': '',
});

const recaptchaContainer = ref(null);
let widgetId = null;
const siteKey = '6LfiRYcrAAAAALrE2NNis2jL7dYKEvDwMllQKg2M';

function renderRecaptcha() {
    if (recaptchaContainer.value && window.grecaptcha) {
        widgetId = window.grecaptcha.render(recaptchaContainer.value, {
            'sitekey': siteKey,
            'callback': (token) => {
                form['g-recaptcha-response'] = token;
            },
            'expired-callback': () => {
                form['g-recaptcha-response'] = '';
            }
        });
    }
}

onMounted(() => {
    if (window.grecaptcha && window.grecaptcha.render) {
        renderRecaptcha();
    } else {
        window.onRecaptchaLoad = renderRecaptcha;
    }
});

onUnmounted(() => {
    if (window.onRecaptchaLoad) {
        window.onRecaptchaLoad = null;
    }
});

const submit = () => {
    form.post(route('landing.storeReport'), {
        onSuccess: () => {
            form.reset();
            if (window.grecaptcha && widgetId !== null) {
                window.grecaptcha.reset(widgetId);
            }
        },
        preserveScroll: true,
    });
};
</script>

<template>
    <section class="section contact__v2" id="report">
        <div class="container">
            <div v-if="$page.props.flash.success" class="alert alert-success mb-4" role="alert">
                {{ $page.props.flash.success }}
            </div>
            <form @submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                            <div class="row gap-3 mb-3">
                                <div class="col-md-12">
                                    <label class="mb-2 fw-bold" for="name">Nama pelapor</label>
                                    <input v-model="form.nama_pelapor" class="form-control" id="name" type="text"
                                        placeholder="Masukkan nama Anda">
                                    <div v-if="form.errors.nama_pelapor" class="text-danger mt-1">{{
                                        form.errors.nama_pelapor }}</div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-2 fw-bold" for="contact-person">Kontak (Telepon/Email)</label>
                                    <input v-model="form.kontak_pelapor" class="form-control" id="contact-person"
                                        type="text" placeholder="Masukkan email atau no. telepon Anda">
                                    <div v-if="form.errors.kontak_pelapor" class="text-danger mt-1">{{
                                        form.errors.kontak_pelapor }}</div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-2 fw-bold" for="subject">Judul laporan</label>
                                    <input v-model="form.judul_laporan" class="form-control" id="subject" type="text"
                                        placeholder="Masukkan judul laporan Anda">
                                    <div v-if="form.errors.judul_laporan" class="text-danger mt-1">{{
                                        form.errors.judul_laporan }}</div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-2 fw-bold" for="category">Kategori laporan</label>
                                    <select v-model="form.kategori_laporan" id="category" class="form-select">
                                        <option value="" disabled>-- Pilih kategori laporan --</option>
                                        <option value="Titik lokasi tidak akurat">Titik lokasi tidak akurat</option>
                                        <option value="Informasi web tidak akurat">Informasi web tidak akurat</option>
                                        <option value="Menambahkan lokasi bangunan baru">Menambahkan lokasi bangunan
                                            baru</option>
                                        <option value="Perubahan nama bangunan">Perubahan nama bangunan</option>
                                    </select>
                                    <div v-if="form.errors.kategori_laporan" class="text-danger mt-1">{{
                                        form.errors.kategori_laporan }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                            <div class="row gap-3 gap-md-0 mb-3">
                                <div class="col-md-12">
                                    <label class="mb-2 fw-bold" for="message">Pesan laporan</label>
                                    <textarea v-model="form.pesan_laporan" class="form-control" id="message"
                                        name="message" rows="8" placeholder="Isi pesan laporan..."></textarea>
                                    <div v-if="form.errors.pesan_laporan" class="text-danger mt-1">{{
                                        form.errors.pesan_laporan }}</div>
                                </div>
                            </div>
                            <div ref="recaptchaContainer"></div>
                            <div v-if="form.errors['g-recaptcha-response']" class="text-danger mt-1">{{
                                form.errors['g-recaptcha-response'] }}</div>
                            <br />
                            <button class="btn btn-primary fw-semibold" type="submit" :disabled="form.processing">
                                <span v-if="form.processing" class="spinner-border spinner-border-sm me-2" role="status"
                                    aria-hidden="true"></span>
                                <i v-else class="bi bi-send-fill"></i>
                                Kirim laporan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>