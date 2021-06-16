/**
 * usege
 * 1. checkbox, buttonにそれぞれjs-confirm-checkbox, js-confirm-buttonクラスをつける
 * 2. ボタンの非活性状態のスタイルはc-button--disabledとする。
 */
export class ConfirmWithCheckbox {
  constructor() {
    this.checkbox = document.querySelector('.js-confirm-checkbox');
    this.button = document.querySelector('.js-confirm-button');

    this.init();
    this.setEvent();
  }

  init() {

  };

  /**
   * set event
   */
  setEvent() {
    this.checkbox.addEventListener('change', (e) => {
      this.onClick(e);
    });
  }

  /**
   * @param {Event} e
   */
  onClick(e) {
    this.toggleButtonActive(e);
  }

  /**
   * @param {Event} e
   */
  toggleButtonActive(e) {
    e.target.checked ?
        this.button.classList.remove('c-button--disabled') :
        this.button.classList.add('c-button--disabled');

    this.button.disabled = !e.target.checked;
  }

}
