export class Alert {
  /**
   * @param {HTMLElement} alert_button
   * @param {string} delete_message
   */
  constructor(alert_button, delete_message) {
    this.alert_button = alert_button;
    this.message = delete_message;

    this.setEvent();
  }

  setEvent() {
    this.alert_button.addEventListener('click', (e) => {
      this.confirmAlert(e);
    });
  }

  /**
   * @param {Event} e
   */
  confirmAlert(e) {
    if (!window.confirm(this.message)) {
      e.preventDefault();
      return false;
    }
    document.alert_button.submit();
  }
}
