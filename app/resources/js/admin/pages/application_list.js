import {Alert} from '../Alert';
import {config_message} from '../../config_message';

export function application_list() {
  const alert_buttons = document.querySelectorAll('.js-alert-button');
  const delete_message = config_message.inactive_app_alert;

  alert_buttons.forEach((button) => {
    new Alert(button, delete_message);
  });
  const rows = document.querySelectorAll('tr');
  rows.forEach((row) => {
    if (row.classList.contains('js-button-active')) {
      row.querySelector('button').disabled = false;
      row.querySelector('button').classList.remove('c-button--disabled');
    }
  });
}
