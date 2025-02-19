<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from '@/Components/ui/alert'
import { ref, onMounted } from 'vue';

defineProps({
  background: String
})

const isVisible = ref(true);

onMounted(() => {
  setTimeout(() => {
    isVisible.value = false;
  }, 4000);
});
</script>

<template>
  <Alert :class="`bg-${background}-100`" v-if="isVisible">
    <div class="flex items-start space-x-3">
      <svg v-if="background === 'green'" class="h-5 w-5 text-green-500 mt-1" width="15" height="15" viewBox="0 0 15 15"
        fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z"
          fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
      </svg>
      <svg v-if="background === 'red'" class="h-5 w-5 text-red-500 mt-1" width="15" height="15" viewBox="0 0 15 15"
        fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M12.8536 2.85355C13.0488 2.65829 13.0488 2.34171 12.8536 2.14645C12.6583 1.95118 12.3417 1.95118 12.1464 2.14645L7.5 6.79289L2.85355 2.14645C2.65829 1.95118 2.34171 1.95118 2.14645 2.14645C1.95118 2.34171 1.95118 2.65829 2.14645 2.85355L6.79289 7.5L2.14645 12.1464C1.95118 12.3417 1.95118 12.6583 2.14645 12.8536C2.34171 13.0488 2.65829 13.0488 2.85355 12.8536L7.5 8.20711L12.1464 12.8536C12.3417 13.0488 12.6583 13.0488 12.8536 12.8536C13.0488 12.6583 13.0488 12.3417 12.8536 12.1464L8.20711 7.5L12.8536 2.85355Z"
          fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
      </svg>
      <div class="flex-1">
        <AlertTitle>
          {{ background === 'green' ? 'Barhasil!' : 'Gagal' }}
        </AlertTitle>
        <AlertDescription class="text-gray-600">
          <slot></slot>
        </AlertDescription>
      </div>
    </div>
  </Alert>
</template>