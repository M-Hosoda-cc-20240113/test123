/**
 * usage
 * 1. モーダル要素にjs-loading-modalクラスをつける
 * 2. loader要素にjs-loading-loaderクラスをつける
 * 3. ローディング表示トリガーにjs-loading-buttonクラスをつける
 */
export class Loading {
  constructor() {
    this.modal = document.querySelector('.js-loading-modal');
    this.loader = document.querySelector('.js-loading-loader');
    this.buttons = document.querySelectorAll('.js-loading-button');

    this.init();
    this.setEvent();
  }

  /**
   * initialize
   */
  init() {

  };

  /**
   * set event
   */
  setEvent() {
    this.buttons.forEach((button) => {
      button.addEventListener('click', (e) => {
        this.onClick(e);
      });
    });
  }

  /**
   * on click event
   * @param {Event} e
   */
  onClick(e) {
    this.showLoading();
    this.disableButton(e);
  }

  /**
   * show loading
   */
  showLoading() {
    this.modal.classList.add('u-db');
    this.loader.classList.remove('u-dn');
  }

  /**
   * disable the button
   * @param {Event} e
   */
  disableButton(e) {
    e.target.disabled = true;
    e.target.form.submit();
  }
}
