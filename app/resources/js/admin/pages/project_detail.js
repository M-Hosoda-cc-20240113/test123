import {Alert} from '../Alert';

const alert_button = document.querySelector('#alert_button');
const delete_message = '本当に削除しますか？';

export function project_detail() {
    new Alert(alert_button, delete_message);
}
