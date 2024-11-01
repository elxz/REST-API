<template>
  <div class="p-8">
    <VaButton class="ml-8" @click="showModal = !showModal">Create new equipment</VaButton>

    <EquipmentsItemComponent
      v-auto-animate
      v-for="equipment in equipments.data"
      :key="equipment.id"
      :equipment="equipment"
    ></EquipmentsItemComponent>

    <PaginateComponent
      v-if="equipments.meta.last_page >= 2"
      :links="equipments.meta.links"
    ></PaginateComponent>

    <VaModal hideDefaultActions v-model="showModal">
      <FormCreateComponent></FormCreateComponent>
    </VaModal>
  </div>
</template>

<script setup lang="ts">
import EquipmentsItemComponent from '@/Components/EquipmentsItemComponent.vue'
import FormCreateComponent from '@/Components/FormCreateComponent.vue'
import PaginateComponent from '@/Components/PaginateComponent.vue'
import { ref } from 'vue'
import IEquipments from '@/Interfaces/IEquipments'

const showModal = ref<boolean>(false)

defineProps<{
  equipments: IEquipments
}>()
</script>

<style scoped></style>
