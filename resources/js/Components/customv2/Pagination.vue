<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: Array,
});
</script>

<template>
    <div v-if="links.length > 3">
        <div class="d-flex flex-wrap gap-1 -mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="btn btn-outline-secondary disabled"
                    v-html="link.label"
                />
                
                <Link
                    v-else
                    class="btn"
                    :class="{ 'btn-primary': link.active, 'btn-outline-primary': !link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>