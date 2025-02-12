<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from '@/Components/ui/alert'
import { ExclamationTriangleIcon } from '@radix-icons/vue'
</script>

<template>
  <Alert variant="destructive">
    <ExclamationTriangleIcon class="w-4 h-4" />
    <AlertTitle>Error</AlertTitle>
    <AlertDescription>
      <slot></slot>
    </AlertDescription>
  </Alert>
</template>