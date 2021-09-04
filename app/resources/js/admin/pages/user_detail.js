import {Alert} from '../Alert';
import {config_message} from '../../config_message';
import {Table} from '../Table';

const table = document.querySelector('.js-invited-table');

export function user_detail() {
  new Table(table);
  const alert_buttons = document.querySelectorAll('.js-alert-button');
  const delete_message = config_message.user_delete_alert;

  alert_buttons.forEach((button) => {
    new Alert(button, delete_message);
  });
}
