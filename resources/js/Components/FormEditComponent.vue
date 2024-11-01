<template>
  <VaForm @submit.prevent="submit" class="flex flex-col items-baseline gap-6 p-8">
    <VaSelect
      class="w-full"
      label="Equipment type"
      :options="equipmentTypeStore.types"
      v-model="form.equipment_type_id"
      text-by="name"
      value-by="id"
      searchable
      required-mark
    ></VaSelect>
    <div class="text-red-600">{{ form.errors.equipment_type_id }}</div>

    <VaInput
      class="w-full"
      label="Serial number"
      v-model="form.serial_number"
      required-mark
    ></VaInput>
    <div class="text-red-600">{{ form.errors.serial_number }}</div>

    <VaTextarea
      class="w-full"
      label="Description"
      v-model="form.description"
      required-mark
    ></VaTextarea>
    <div class="text-red-600">{{ form.errors.description }}</div>

    <VaButton class="w-24" :disabled="form.processing" type="submit">Edit</VaButton>
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
  await form.put(route('api.equipments.update', props.equipment.id), {
    onSuccess: () => {
      alert('Success')
    }
  })
}
</script>

<style scoped></style>
