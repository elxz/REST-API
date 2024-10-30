<template>
  <VaForm @submit.prevent="submit" class="flex flex-col items-baseline gap-6 p-8">
    <VaSelect
      class="w-full"
      label="Тип оборудования"
      :options="equipmentTypeStore.types"
      v-model="equipment_type_id"
      text-by="name"
      value-by="id"
      searchable
    ></VaSelect>
    <VaTextarea class="w-full" label="Серийные номера" v-model="serial_number"></VaTextarea>
    <VaTextarea class="w-full" label="Примечание" v-model="description"></VaTextarea>
    <VaButton :disabled="form.processing" type="submit">Добавить</VaButton>
  </VaForm>
</template>

<script setup lang="ts">
import { useForm, InertiaForm } from '@inertiajs/vue3'
import useEquipmentTypeStore from '@/Store/EquipmentTypeStore'
import { ref } from 'vue'

const equipmentTypeStore = useEquipmentTypeStore()

const equipment_type_id = ref<number | null>(null)
const serial_number = ref<string>('')
const description = ref<string>('')

const form: InertiaForm<{
  equipments: object[]
}> = useForm({
  equipments: []
})

const submit = async (): Promise<void> => {
  const data: object[] = []
  serial_number.value.split('\n').forEach((element) => {
    data.push({
      equipment_type_id: equipment_type_id.value,
      serial_number: element,
      description: description.value
    })
  })
  form.equipments = data

  await form.post(route('api.equipments.store'), {
    onSuccess: () => form.reset()
  })
}
</script>

<style scoped></style>
