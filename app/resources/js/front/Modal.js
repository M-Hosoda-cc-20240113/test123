/**
 * useage
 * 1. モーダルにjs-modalをつける
 * 2. モーダル内コンテンツにjs-modal-contentをつける
 * 3. モーダル表示トリガーにjs-modal-buttonをつける
 * 4. モーダルを閉じるボタンにはjs-modal-close-buttonをつける
 */
export class Modal {
  constructor() {
    this.modal = document.querySelector('.js-modal');
    this.content = document.querySelector('.js-modal-content');
    this.toggle_button = document.querySelector('.js-modal-button');
    this.close_button = document.querySelector('.js-modal-close-button');

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
    this.toggle_button.addEventListener('click', (e) => {
      this.onClick(e);
    });
    this.close_button.addEventListener('click', (e) => {
      this.onClick(e);
    });
    this.modal.addEventListener('click', (e) => {
      this.onClick(e);
    });
    this.content.addEventListener('click', (e) => {
      this.onClick(e);
    });
  }

  /**
   * on click
   * @param {Event} e
   */
  onClick(e) {
    switch (e.target) {
      case this.toggle_button:
        this.activeModal();
        break;
      case this.close_button:
        this.closeModal();
        break;
      case this.modal:
        this.closeModal();
        break;
      case this.content:
        break;
    }
  }

  /**
   * active modal
   */
  activeModal() {
    this.modal.classList.add('js-active');
    this.content.classList.add('js-active');
  }

  /**
   * close modal
   */
  closeModal() {
    this.modal.classList.remove('js-active');
    this.content.classList.remove('js-active');
  }
}