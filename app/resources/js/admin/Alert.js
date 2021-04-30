export class Alert {

    /**
     * @param {Element|string} alert
     */
    constructor(alert_button) {
        this.alert_button = alert_button
        this.setEvent();
    }

    setEvent() {
        this.alert_button.addEventListener("click", (e) => {
            this.delete_alert(e);
        });
    }

    /**
     * @param {Event} e
     */
    delete_alert(e) {
        if (!window.confirm('本当に削除しますか？')) {
            window.alert('キャンセルされました');
            e.preventDefault();
            return false;
        }
        document.alert_button.submit();
    };
}
