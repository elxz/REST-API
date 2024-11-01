<template>
  <div class="p-8 h-screen relative">
    <VaButton class="ml-4" @click="showModal = !showModal">Create new equipment</VaButton>

    <EquipmentsItemComponent
      v-auto-animate
      v-for="equipment in equipments.data"
      :key="equipment.id"
      :equipment="equipment"
    ></EquipmentsItemComponent>

    <VaModal hideDefaultActions v-model="showModal">
      <FormCreateComponent></FormCreateComponent>
    </VaModal>

    <div class="absolute bottom-0 m-4">
      <PaginateComponent
        v-if="equipments.meta.last_page >= 2"
        :links="equipments.meta.links"
      ></PaginateComponent>
    </div>
  </div>
</template>

<script setup lang="ts">
import EquipmentsItemComponent from '@/Components/EquipmentsItemComponent.vue'
import FormCreateComponent from '@/Components/FormCreateComponent.vue'
import PaginateComponent from '@/Components/PaginateComponent.vue'
import { ref } from 'vue'
import useEquipmentTypeStore from '@/Stores/EquipmentTypeStore'
import IEquipmentMeta from '@/Interfaces/IEquipmentMeta'

const equipmentTypeStore = useEquipmentTypeStore()

const showModal = ref<boolean>(false)

defineProps<{
  equipments: IEquipmentMeta
}>()
</script>

<style scoped></style>
