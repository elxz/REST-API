<template>
  <VaForm @submit.prevent="submit" class="flex flex-col items-baseline gap-6 p-4">
    <VaSelect
      class="w-full"
      label="Equipment type"
      :options="equipmentTypeStore.types"
      v-model="form.equipment_type_id"
      text-by="name"
      value-by="id"
      searchable
      required-mark
      immediate-validation
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

    <VaButton :disabled="form.processing" type="submit">Create</VaButton>
  </VaForm>
</template>

<script setup lang="ts">
import { useForm, InertiaForm } from '@inertiajs/vue3'
import useEquipmentTypeStore from '@/Stores/EquipmentTypeStore'

const equipmentTypeStore = useEquipmentTypeStore()

const form: InertiaForm<{
  equipment_type_id: number | null
  serial_number: string
  description: string
}> = useForm({
  equipment_type_id: null,
  serial_number: '',
  description: ''
})

const submit = async (): Promise<void> => {
  await form.post(route('api.equipments.store'), {
    onSuccess: () => {
      form.reset()
      alert('Success')
    }
  })
}
</script>

<style scoped></style>
