<script setup lang="ts">
import { cn } from '@/lib/utils'
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="w-full overflow-x-auto whitespace-nowrap">
    <nav :class="cn('flex items-center space-x-4 lg:space-x-6', $attrs.class ?? '')">
      <Link :href="route('admin.dashboard')" class="text-sm font-medium transition-colors hover:text-primary"
        :class="{ 'text-muted-foreground': !$page.url.startsWith('/dashboard') }">
      Dashboard
      </Link>
      <Link :href="route('admin.schedule')" class="text-sm font-medium transition-colors hover:text-primary"
        :class="{ 'text-muted-foreground': !$page.url.startsWith('/jadwal-kegiatan') }">
      Jadwal Kegiatan
      </Link>
      <Link :href="route('admin.building')" class="text-sm font-medium transition-colors hover:text-primary"
        :class="{ 'text-muted-foreground': !$page.url.startsWith('/bangunan') }">
      Bangunan
      </Link>
      <Link :href="route('admin.userManagement')" class="text-sm font-medium transition-colors hover:text-primary"
        :class="{ 'text-muted-foreground': !$page.url.startsWith('/manajemen-pengguna') }">
      Manajemen Pengguna
      </Link>
      <Link :href="route('admin.setting')" class="text-sm font-medium transition-colors hover:text-primary"
        :class="{ 'text-muted-foreground': !$page.url.startsWith('/pengaturan-desa') }">
      Pengaturan Desa
      </Link>
    </nav>
  </div>
</template>