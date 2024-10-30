import IEquipmentType from '@/Interfaces/IEquipmentType'
import axios from 'axios'
import { defineStore } from 'pinia'
import { onMounted, ref } from 'vue'

export const useEquipmentTypeStore = defineStore('equipment_type', () => {
  const types = ref<IEquipmentType[]>([])

  const fetching = async (): Promise<void> => {
    try {
      const response = await axios.get('/api/equipment-type')
      types.value = response.data
    } catch (err) {
      alert(err)
    }
  }

  onMounted(fetching)

  const getEquipmentType = ($id: number) => {
    return types.value.find((type) => type.id === $id)
  }

  return { types, getEquipmentType }
})

export default useEquipmentTypeStore
