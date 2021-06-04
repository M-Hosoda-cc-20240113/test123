import {Alert} from '../Alert';
import {config_message} from '../../config_message';
import {Table} from '../Table';

const app_table = document.querySelector('.js-app-table');
const assign_table = document.querySelector('.js-assign-table');

export function project_detail() {
  const alert_button = document.querySelector('.js-alert-button');
  const delete_message = config_message.delete_alert;
  if (app_table) new Table(app_table);
  if (assign_table) new Table(assign_table);
  if (alert_button) new Alert(alert_button, delete_message);
}
