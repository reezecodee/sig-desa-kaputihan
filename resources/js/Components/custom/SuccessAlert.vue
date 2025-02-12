<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from '@/Components/ui/alert'
import { RocketIcon } from '@radix-icons/vue'
</script>

<template>
  <Alert>
    <RocketIcon class="h-4 w-4" />
    <AlertTitle>Heads up!</AlertTitle>
    <AlertDescription>
      <slot></slot>
    </AlertDescription>
  </Alert>
</template>