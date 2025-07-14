<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="navbar-brand w-auto" href="">
                <img class="logo dark img-fluid" src="assets/images/logo-dark.svg"
                    alt="FreeBootstrap.net image placeholder">
                <img class="logo light img-fluid" src="assets/images/logo-light.svg"
                    alt="FreeBootstrap.net image placeholder">
            </a>

            <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                aria-labelledby="fbs__net-navbarsLabel">
                <div class="offcanvas-header">
                    <div class="offcanvas-header-logo">
                        <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                            <img class="logo dark img-fluid" src="assets/images/logo-dark.svg"
                                alt="FreeBootstrap.net image placeholder">
                            <img class="logo light img-fluid" src="assets/images/logo-light.svg"
                                alt="FreeBootstrap.net image placeholder">
                        </a>
                    </div>

                    <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                    </button>
                </div>

                <div class="offcanvas-body align-items-lg-center">
                    <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <Link class="nav-link scroll-link active" aria-current="page" :href="route('landing.home')">
                                Home
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link scroll-link" href="">
                                Tentang Desa
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link scroll-link" href="">
                                Batas Wilayah
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link scroll-link" href="">
                                Statistik Desa
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link scroll-link" href="">
                                Bangunan Desa
                            </Link>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="ms-auto w-auto">
                <div class="header-social d-flex align-items-center gap-1">
                    <a class="btn btn-primary py-2" :href="route('login')">Login</a>

                    <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto"
                        data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars"
                        aria-label="Toggle navigation" aria-expanded="false">
                        <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="21" x2="3" y1="6" y2="6"></line>
                            <line x1="15" x2="3" y1="12" y2="12"></line>
                            <line x1="17" x2="3" y1="18" y2="18"></line>
                        </svg>
                        <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>