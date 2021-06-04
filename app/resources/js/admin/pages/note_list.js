import {Alert} from '../Alert';
import {config_message} from '../../config_message';
import {Table} from '../Table';

const table = document.querySelector('table');

export function note_list() {
  new Table(table);
  const alert_buttons = document.querySelectorAll('.js-alert-button');
  const delete_message = config_message.delete_alert;

  alert_buttons.forEach((button) => {
    new Alert(button, delete_message);
  });
}
