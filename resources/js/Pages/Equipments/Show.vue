<template>
  <div class="p-8">
    <Link :href="route('api.equipments.index')"><VaButton>На главную</VaButton></Link>
  </div>
  <div class="m-8">
    <h1 class="text-3xl"><span class="underline">Тип</span>{{ equipment.equipment_type.name }}</h1>
    <h1 class="text-3xl">Серийный номер - {{ equipment.serial_number }}</h1>
    <h1 class="text-3xl">Описание - {{ equipment.description }}</h1>
  </div>
  <div class="flex justify-center items-center">
    <div class="flex justify-center flex-col">
      <FormEditComponent :equipment="equipment"></FormEditComponent>
      <div class="ml-8"><VaButton color="danger" @click="destroy">Удалить элемент</VaButton></div>
    </div>
  </div>
</template>

<script setup lang="ts">
import IEquipment from '@/Interfaces/IEquipment'
import FormEditComponent from '@/Components/FormEditComponent.vue'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const props = defineProps<{
  equipment: IEquipment
}>()

const form = useForm({})

const destroy = async () => {
  await form.delete(route('api.equipments.destroy', props.equipment.id))
}
</script>

<style scoped></style>
