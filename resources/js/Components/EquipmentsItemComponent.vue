<template>
  <Link :href="route('api.equipments.show', equipment.id)"
    ><VaCard class="m-4 hover:brightness-50 hover:transition-all" tag="b">
      <VaCardTitle>
        ID:{{ equipment.id }} |
        {{ equipment.equipment_type.name }}
      </VaCardTitle>
      <VaCardContent>Serial number: {{ equipment.serial_number }}</VaCardContent>
      <VaCardContent>Description: {{ equipment.description }}</VaCardContent>
    </VaCard></Link
  >
</template>

<script setup lang="ts">
import IEquipment from '@/Interfaces/IEquipment'
import { Link } from '@inertiajs/vue3'

defineProps<{
  equipment: IEquipment
}>()
</script>

<style scoped></style>
