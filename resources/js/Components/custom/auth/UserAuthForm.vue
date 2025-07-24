<script setup lang="ts">
import { Button } from '@/Components/ui/button'
import { Input } from '@/Components/ui/input'
import { Label } from '@/Components/ui/label'

import { cn } from '@/lib/utils'
import { ref, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  login: null,
  password: null,
  remember: false,
})

const isLoading = ref(false)

async function onSubmit(event: Event) {
  event.preventDefault()
  isLoading.value = true

  form.post(route('auth.loginProcess'))

  isLoading.value = false
}
</script>

<template>
  <div :class="cn('grid gap-6', $attrs.class ?? '')">
    <form @submit="onSubmit">
      <div class="grid gap-7">
        <div class="grid gap-1">
          <Label for="login">
            Email atau nomor telepon
          </Label>
          <Input id="login" placeholder="Masukkan email atau nomor telepon" type="text" auto-capitalize="none"
            auto-correct="off" :disabled="isLoading" v-model="form.login" />
          <div v-if="form.errors.login" class="text-red-500 text-sm">{{ form.errors.login }}</div>
        </div>
        <div class="grid gap-1">
          <Label for="password">
            Password
          </Label>
          <Input id="password" placeholder="Masukkan password" type="password" auto-capitalize="none" auto-correct="off"
            :disabled="isLoading" v-model="form.password" />
          <div v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password }}</div>
        </div>
        <Button class="shadcn-btn edit-btn" :disabled="isLoading">
          Login
        </Button>
      </div>
    </form>
  </div>
</template>
