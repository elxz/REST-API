import IEquipmentType from '@/Interfaces/IEquipmentType'
import axios from 'axios'
import { defineStore } from 'pinia'
import { onMounted, ref } from 'vue'

export const useEquipmentTypeStore = defineStore('equipment_type', () => {
  const types = ref<IEquipmentType[]>([])

  const fetching = async (): Promise<void> => {
    try {
      const response = await axios.get(route('api.equipment-type.index'))
      types.value = response.data
    } catch (err) {
      alert(err)
    }
  }

  onMounted(fetching)

  return { types }
})

export default useEquipmentTypeStore
