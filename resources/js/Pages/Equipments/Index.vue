<template>
  <div class="p-8">
    <VaButton class="ml-8" @click="showModal = !showModal">Добавить новое оборудование</VaButton>

    <EquipmentsItemComponent
      v-for="equipment in equipments.data"
      :key="equipment.id"
      :equipment="equipment"
    ></EquipmentsItemComponent>

    <VaPagination
      v-model="equipments.meta.current_page"
      :pages="equipments.meta.last_page"
      :visible-pages="5"
      gapped
      class="justify-center sm:justify-start"
    >
    </VaPagination>

    <VaModal hideDefaultActions v-model="showModal">
      <FormCreateComponent></FormCreateComponent>
    </VaModal>
  </div>
</template>

<script setup lang="ts">
import EquipmentsItemComponent from '@/Components/EquipmentsItemComponent.vue'
import FormCreateComponent from '@/Components/FormCreateComponent.vue'
import { ref } from 'vue'
import IEquipments from '@/Interfaces/IEquipments'
import { useForm, InertiaForm } from '@inertiajs/vue3'

const showModal = ref<boolean>(false)

const form: InertiaForm<{
  equipments: object[]
}> = useForm({
  equipments: []
})

const props = defineProps<{
  equipments: IEquipments
}>()
</script>

<style scoped></style>
