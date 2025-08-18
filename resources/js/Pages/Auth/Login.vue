<script setup lang="ts">
import { buttonVariants } from '@/Components/ui/button'
import UserAuthForm from '@/Components/custom/auth/UserAuthForm.vue'
import { Head } from '@inertiajs/vue3';

defineProps({
  title: String
})
</script>

<template>

  <Head :title="title" />
  <div
    class="container min-h-screen overflow-hidden flex flex-col items-center justify-center md:grid lg:max-w-none lg:grid-cols-2 lg:px-0">
    <div class="relative hidden h-full flex-col bg-muted p-10 text-white dark:border-r lg:flex">
      <img src="/placeholder/login-bg-2.jpg" class="absolute inset-0">
      <div class="relative z-20 mt-auto">
        <blockquote class="space-y-2">
          <p class="text-lg">
            &ldquo;Kami senang Anda sudah berkunjung ke website desa kami, semoga melalui situs web ini kami dapat
            memberikan segala informasi yang aktual.&rdquo;
          </p>
          <footer class="text-sm">
            Ujang Herman RN - Kepala Desa Kaputihan Periode 2021-2027
          </footer>
        </blockquote>
      </div>
    </div>
    <div class="lg:p-8">
      <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
        <div class="flex flex-col space-y-2 text-center">
          <h1 class="text-2xl font-semibold tracking-tight">
            Selamat Datang
          </h1>
          <p class="text-sm text-muted-foreground">
            Masukkan data akun yang terdaftar untuk melanjutkan
          </p>
        </div>
        <UserAuthForm />
        <p class="px-8 text-center text-sm text-muted-foreground">
          <a href="/" target="_blank" class="hover:text-primary">
            Kembali ke halaman utama
          </a>
        </p>
      </div>
    </div>
  </div>

</template>