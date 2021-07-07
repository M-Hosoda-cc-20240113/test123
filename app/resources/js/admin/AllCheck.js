export class AllCheck {
  /**
   * 1. 全選択用チェックボックスにjs-check-all
   * 2. 各チェックボックスにjs-checkbox-list
   */
  constructor() {
    this.check_all = document.querySelector('.js-check-all');
    this.check_list = document.querySelectorAll('.js-checkbox-list');

    this.init();
    this.setEvent();
  }

  /**
   * initialize
   */
  init() {
  }

  /**
   * set event
   */
  setEvent() {
    this.check_all.addEventListener('change', e => {
      this.onChange(e);
    });
  }

  /**
   * @param {Event} e
   */
  onChange(e) {
    this.toggleCheckBox(this.check_all.checked);
  }

  /**
   * @param {boolean} checked
   * 「全てチェック」のon/offをlistに反映
   */
  toggleCheckBox(checked) {
    this.check_list.forEach((item)=> {
      item.checked = checked;
    });
  }
}
