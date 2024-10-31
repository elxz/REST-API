<template>
  <div class="flex justify-center space-x-1">
    <Link
      v-for="(link, linkIndex) in links"
      :key="linkIndex"
      :href="link.url"
      v-show="link.url !== null"
      class="px-4 py-3 text-sm font-bold leading-4 text-white border rounded bg-blue-600 hover:bg-blue-500 active:bg-blue-400"
      :class="{ 'bg-blue-800': link.active }"
    >
      <span v-html="link.label"></span>
    </Link>
  </div>
</template>

<script setup lang="ts">
import ILink from '@/Interfaces/ILink'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
  links: ILink[]
}>()
const lastPage = ref<ILink>(props.links[props.links.length - 2])
const firstPage = ref<ILink>(props.links[1])
</script>

<style scoped></style>
