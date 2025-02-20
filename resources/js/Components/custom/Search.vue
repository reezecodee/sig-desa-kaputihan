<script setup lang="ts">
import { Input } from '@/Components/ui/input'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const search = ref<string>('')

const onSubmit = () => {
  if (!search.value.trim()) return

  const slug = search.value
    .trim()
    .toLowerCase()
    .replace(/\s+/g, '-') 
    .replace(/[^a-z0-9-]/g, '')

  window.location.href = `/${encodeURIComponent(slug)}`
}
</script>

<template>
  <div>
    <form @submit.prevent="onSubmit">
      <Input type="search" v-model="search" placeholder="Cari halaman..." class="md:w-[100px] lg:w-[300px]" />
    </form>
  </div>
</template>