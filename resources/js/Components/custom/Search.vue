<script setup lang="ts">
import { Input } from '@/Components/ui/input'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const search = ref<string>('')

const onSubmit = () => {
  if (!search.value.trim()) return
  router.visit(`/${encodeURIComponent(search.value)}`)
}
</script>

<template>
  <div>
    <form @submit.prevent="onSubmit">
      <Input type="search" v-model="search" placeholder="Cari halaman..." class="md:w-[100px] lg:w-[300px]" />
    </form>
  </div>
</template>