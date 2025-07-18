<template>
    <section class="section faq__v2" id="faq">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                        data-aos="fade-up" data-aos-delay="0">FAQ</span>
                    <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Frequently Asked Questions
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Daftar pertanyaan yang sering diajukan oleh para pengguna aplikasi
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-content">
                        <div class="accordion custom-accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne"> Apa itu aplikasi SIG Desa Kaputihan? </button>
                                </h2>
                                <div class="accordion-collapse collapse show" id="panelsStayOpen-collapseOne">
                                    <div class="accordion-body">SID Desa Kaputihan adalah platform digital yang menyajikan informasi geografis (spasial) mengenai wilayah Desa Kaputihan. Aplikasi ini berfungsi sebagai peta interaktif yang menampilkan lokasi-lokasi penting seperti fasilitas umum, batas wilayah, statistik desa, dan data kependudukan yang mudah diakses.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo"> Informasi apa saja yang bisa saya temukan di aplikasi ini? </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panelsStayOpen-collapseTwo">
                                    <div class="accordion-body">
                                        Anda dapat menemukan berbagai informasi, di antaranya:
                                        <ul>
                                            <li>
                                                <b>Fasilitas Umum:</b> Anda bisa menemukan informasi detail terkait bangunan umum yang menjadi vital desa.
                                            </li>
                                            <li>
                                                <b>Batas Wilayah::</b> Anda dapat melihat batas wilayah desa beserta titik lokasi, dusun, dan RT/RW.
                                            </li>
                                            <li>
                                                <b>Statistik Desa:</b> Anda bisa melihat data statistik desa dengan grafik interaktif seperti kependudukan, bangunan, dan lain-lain.
                                            </li>
                                            <li>
                                                <b>Jadwal Kegiatan:</b> Anda bisa melihat jadwal apa saja yang direncanakan oleh pihak desa dalam bentuk kalender beserta keterangannya.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree"> Bagaimana cara mencari bangunan tertentu? </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panelsStayOpen-collapseThree">
                                    <div class="accordion-body">
                                        Anda bisa menggunakan fitur pencarian (ikon kaca pembesar) di halaman Bangunan Desa dengan mengetikkan nama lokasi yang ingin dicari, misalnya "Kantor kepala desa kaputihan".
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">  Apakah data yang ditampilkan dijamin akurat? </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFour">
                                    <div class="accordion-body">Data dikelola langsung oleh tim dari Pemerintah Desa Kaputihan dan diupayakan untuk diperbarui secara berkala. Namun, perubahan kondisi di lapangan mungkin terjadi. Jika Anda menemukan data yang tidak sesuai atau keliru, kami sangat menghargai laporan Anda untuk perbaikan</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFive"> Tempat usaha saya belum ada di peta, bagaimana cara menambahkannya? </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFive">
                                    <div class="accordion-body">
                                        Kami menyambut partisipasi warga. Anda dapat mengajukan lokasi baru dengan datang ke Kantor Kepala Desa Kaputihan. Tim kami akan melakukan verifikasi terlebih dahulu sebelum lokasi tersebut ditampilkan di peta untuk memastikan validitas data.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseSix"> Siapa yang harus saya hubungi jika menemukan kesalahan data? </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="panelsStayOpen-collapseSix">
                                    <div class="accordion-body">
                                        Jika Anda menemukan kesalahan informasi (misalnya, salah nama, salah titik lokasi, atau deskripsi keliru), silakan gunakan fitur "Laporkan Masalah" yang ada pada halaman ini. Anda juga bisa menghubungi kami melalui email tertera pada bagian bawah halaman (footer) aplikasi ini.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>