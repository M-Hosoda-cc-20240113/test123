import {Alert} from '../Alert';
import {config_message} from '../../config_message';

export function assign_list() {
  const alert_buttons = document.querySelectorAll('.js-alert-button');
  const delete_message = config_message.delete_assign_alert;

  alert_buttons.forEach((button) => {
    new Alert(button, delete_message);
  });
}
