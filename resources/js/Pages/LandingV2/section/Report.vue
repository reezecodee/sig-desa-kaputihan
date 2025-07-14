<template>
    <section class="section contact__v2" id="contact">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                        data-aos="fade-up" data-aos-delay="0">Laporkan</span>
                    <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Laporkan Masalah</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Jika kamu mempunyai masalah terkait data yang ditampilkan diwebsite ini atau masalah lain, jangan ragu untuk memberi tahu kami.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex gap-5 flex-column">
                        <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="0">
                            <div class="icon d-block"><i class="bi bi-telephone"></i></div><span> <span
                                    class="d-block">Telepon</span><strong>+(01 234 567 890)</strong></span>
                        </div>
                        <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon d-block"><i class="bi bi-send"></i></div><span> <span
                                    class="d-block">Email</span><strong>info@mydomain.com</strong></span>
                        </div>
                        <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon d-block"><i class="bi bi-geo-alt"></i></div><span> <span
                                    class="d-block">Alamat kantor kepala desa</span>
                                <address class="fw-bold">123 Main Street Apt 4B Springfield, <br> IL 62701
                                    United States</address>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                        <form id="contactForm">
                            <div class="row gap-3 mb-3">
                                <div class="col-md-12">
                                    <label class="mb-2" for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-2" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="row gap-3 mb-3">
                                <div class="col-md-12">
                                    <label class="mb-2" for="subject">Subject</label>
                                    <input class="form-control" id="subject" type="text" name="subject">
                                </div>
                            </div>
                            <div class="row gap-3 gap-md-0 mb-3">
                                <div class="col-md-12">
                                    <label class="mb-2" for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5"
                                        required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary fw-semibold" type="submit">Send Message</button>
                        </form>
                        <div class="mt-3 d-none alert alert-success" id="successMessage">Message sent
                            successfully!</div>
                        <div class="mt-3 d-none alert alert-danger" id="errorMessage">Message sending failed.
                            Please try again later.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>