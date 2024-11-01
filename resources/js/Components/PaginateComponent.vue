<template>
  <div class="flex space-x-1 justify-center">
    <template v-for="(link, linkIndex) in links" :key="linkIndex">
      <div v-if="link.url === null"></div>
      <Link
        v-else
        :href="link.url"
        class="px-4 py-3 text-sm font-bold leading-4 text-white border rounded bg-blue-700 hover:bg-blue-500 active:bg-blue-400"
        :class="{ 'bg-blue-950': link.active }"
      >
        <span v-html="link.label"></span> </Link
    ></template>
  </div>
</template>

<script setup lang="ts">
import ILink from '@/Interfaces/ILink'
import { Link } from '@inertiajs/vue3'

defineProps<{
  links: ILink[]
}>()
</script>

<style scoped></style>
