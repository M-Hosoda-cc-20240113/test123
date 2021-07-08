import {Modal} from '../../front/Modal';
import {AllCheck} from '../AllCheck';
import {Alert} from '../Alert';
import {config_message} from '../../config_message';
import {CopyFragment} from '../../front/CopyFragment';

export function project_list() {
  const alert_button = document.querySelector('.js-alert-button');
  const delete_message = config_message.project_delete_alert;

  new AllCheck();
  new Alert(alert_button, delete_message);
  new Modal();
  new CopyFragment(0, 4, true);
}
