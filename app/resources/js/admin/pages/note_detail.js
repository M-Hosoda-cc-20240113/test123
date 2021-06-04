import {Alert} from '../Alert';
import {config_message} from '../../config_message';

export function note_detail() {
  const alert_button = document.querySelector('.js-alert-button');
  const delete_message = config_message.delete_alert;
  if (alert_button) new Alert(alert_button, delete_message);
}
