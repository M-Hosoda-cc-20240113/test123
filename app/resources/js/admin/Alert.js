export class Alert {

    /**
     * @param {Element|string} alert
     */
    constructor(alert_button, delete_message) {
        this.alert_button = alert_button;
        this.message = delete_message;
        this.setEvent();
    }

    setEvent() {
        this.alert_button.addEventListener("click", (e) => {
            this.confirmAlert(e,this.message);
        });
    }

    /**
     * @param {Event} e
     */
    confirmAlert(e, message) {
        if (!window.confirm(message)) {
            e.preventDefault();
            return false;
        }
        document.alert_button.submit();
    };
}
