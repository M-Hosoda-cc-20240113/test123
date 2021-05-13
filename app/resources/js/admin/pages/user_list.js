import { Table } from '../Table'
import { TabContentsLink } from '../../front/TabContentsLink'
import { CopyFragment } from '../../front/CopyFragment'

const table = document.querySelector('table')

export function user_list() {
  new TabContentsLink()
  new Table(table)
  new CopyFragment(0, 4, true)
}
