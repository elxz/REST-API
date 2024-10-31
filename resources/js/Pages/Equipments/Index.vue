<template>
  <div class="p-8">
    <VaButton class="ml-8" @click="showModal = !showModal">Добавить новое оборудование</VaButton>

    <EquipmentsItemComponent
      v-for="equipment in equipments.data"
      :key="equipment.id"
      :equipment="equipment"
    ></EquipmentsItemComponent>

    <PaginateComponent :links="equipments.meta.links"></PaginateComponent>

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
