import IEquipmentType from './IEquipmentType'

export default interface IEquipment {
  id: number
  equipment_type_id: number
  equipment_type: IEquipmentType
  serial_number: string
  description: string
}
