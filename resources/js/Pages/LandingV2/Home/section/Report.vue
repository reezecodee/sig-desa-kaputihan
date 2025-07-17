<template>
    <section class="section contact__v2" id="report">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                        data-aos="fade-up" data-aos-delay="0">Laporkan</span>
                    <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Laporkan Masalah</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Jika kamu mempunyai masalah terkait data yang ditampilkan
                        diwebsite ini atau masalah lain, jangan ragu untuk memberi tahu kami.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                        <div class="row gap-3 mb-3">
                            <div class="col-md-12">
                                <label class="mb-2 fw-bold" for="name">Nama pelapor</label>
                                <input class="form-control" id="name" type="text" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2 fw-bold" for="contact-person">Kontak (Telepon/Email)</label>
                                <input class="form-control" id="contact-person" type="contact-person" placeholder="Masukkan email atau no. telepon Anda" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2 fw-bold" for="subject">Judul laporan</label>
                                <input class="form-control" id="subject" type="subject" placeholder="Masukkan judul laporan Anda" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2 fw-bold" for="category">Kategori laporan</label>
                                <select id="category" class="form-select" required>
                                    <option selected>-- Pilih kategori laporan --</option>
                                    <option value="Titik lokasi tidak akurat">
                                        Titik lokasi tidak akurat
                                    </option>
                                    <option value="Informasi web tidak akurat">
                                        Informasi web tidak akurat
                                    </option>
                                    <option value="Menambahkan lokasi bangunan baru">
                                        Menambahkan lokasi bangunan baru
                                    </option>
                                    <option value="Perubahan nama bangunan">
                                        Perubahan nama bangunan
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                        <div class="row gap-3 gap-md-0 mb-3">
                            <div class="col-md-12">
                                <label class="mb-2 fw-bold" for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="8" placeholder="Isi pesan laporan..." required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary fw-semibold" type="submit">
                            <i class="bi bi-send-fill"></i>
                            Kirim laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
