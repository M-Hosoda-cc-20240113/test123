import { Alert } from '../Alert'

export function project_detail() {
  const alert_button = document.querySelector('#alert_button')
  const delete_message = '本当に削除しますか？'

  new Alert(alert_button, delete_message)
}
