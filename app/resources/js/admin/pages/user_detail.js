import {Alert} from '../Alert';
import {config_message} from '../../config_message';

export function user_detail() {
    const alert_buttons = document.querySelectorAll('.js-alert-button');
    const delete_message = config_message.user_delete_alert;

    alert_buttons.forEach((button) => {
        new Alert(button, delete_message);
    });
}
