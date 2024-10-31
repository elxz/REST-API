<template>
  <VaForm @submit.prevent="submit" class="flex flex-col items-baseline gap-6 p-8">
    <VaSelect
      label="Тип оборудования"
      :options="equipmentTypeStore.types"
      v-model="form.equipment_type_id"
      text-by="name"
      value-by="id"
      searchable
    ></VaSelect>
    <VaTextarea label="Серийный номер" v-model="form.serial_number"></VaTextarea>
    <VaTextarea label="Примечание" v-model="form.description"></VaTextarea>
    <VaButton :disabled="form.processing" type="submit">Подтвердить изменения</VaButton>
  </VaForm>
</template>

<script setup lang="ts">
import IEquipment from '@/Interfaces/IEquipment'
import { useForm, InertiaForm } from '@inertiajs/vue3'
import useEquipmentTypeStore from '@/Stores/EquipmentTypeStore'

const props = defineProps<{
  equipment: IEquipment
}>()

const equipmentTypeStore = useEquipmentTypeStore()

const form: InertiaForm<{
  equipment_type_id: number | null
  serial_number: string
  description: string
}> = useForm({
  equipment_type_id: props.equipment.equipment_type.id,
  serial_number: props.equipment.serial_number,
  description: props.equipment.description
})

const submit = async (): Promise<void> => {
  await form.put(route('api.equipments.update', props.equipment.id))
}
</script>

<style scoped></style>
