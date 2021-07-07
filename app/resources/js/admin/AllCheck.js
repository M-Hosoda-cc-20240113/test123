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
      this.changeAll(e);
    });
  }

  /**
   * @param {Event} e
   */
  changeAll(e) {
    if (this.check_all.checked) {
      for (let i in this.check_list) {
        if (this.check_list.hasOwnProperty(i)) {
          this.check_list[i].checked = true;
        }
      }
    } else {
      for (let i in this.check_list) {
        if (this.check_list.hasOwnProperty(i)) {
          this.check_list[i].checked = false;
        }
      }
    }
  }
}
