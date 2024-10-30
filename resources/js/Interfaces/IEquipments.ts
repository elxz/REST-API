import IEquipment from './IEquipment'

export default interface IEquipments {
  data: IEquipment[]
  links: {
    first: string
    last: string
    prev: string
    next: string
  }
  meta: {
    last_page: number
    current_page: number
    links: Array<{ url: string; label: string; active: boolean }>
  }
}
