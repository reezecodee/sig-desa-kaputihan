<script setup lang="ts">
import { cn } from '@/lib/utils'
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <nav :class="cn('flex items-center space-x-4 lg:space-x-6', $attrs.class ?? '')">
    <Link href="/dashboard" class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/dashboard') }">
      Dashboard
    </Link>
    <Link href="/blog"
      class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/blog') }">
      Blog
    </Link>
    <Link href="/pengaduan"
      class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/pengaduan') }">
      Pengaduan
    </Link>
    <Link href="/jadwal-kegiatan"
      class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/jadwal-kegiatan') }">
      Jadwal Kegiatan
    </Link>
    <Link href="/peta-wilayah"
      class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/peta-wilayah') }">
      Peta Wilayah
    </Link>
    <Link href="/manajemen-pengguna"
      class="text-sm font-medium transition-colors hover:text-primary" :class="{ 'text-muted-foreground': !$page.url.startsWith('/manajemen-pengguna') }">
      Manajemen Pengguna
    </Link>
  </nav>
</template>