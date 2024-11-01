import IEquipment from './IEquipment'

export default interface IEquipmentMeta {
  data: IEquipment[]
  meta: {
    last_page: number
    current_page: number
    links: Array<{ url: string; label: string; active: boolean }>
  }
}
