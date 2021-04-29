/**
 * usege
 * 1. コンテンツの親要素に'js-parent'を付与
 * 2. 追加ボタンに'js-add'を付与
 * 3. 削除ボタンに'js-remove'を付与
 *
 * 擬似要素を削除ボタンとする場合は第二引数にtrueを入れる。
 * 追加最大値は第一引数に入れる(defaultは10)
 */
export class CopyFragment {
  constructor(copy_limit = 10, delete_btn_is_after_el = false) {
    this.template = document.querySelector('template');
    this.parent = document.querySelector('.js-parent');
    this.add_button = document.querySelector('.js-add');
    this.remove_button = document.querySelector('.js-remove');
    this.copy_limit = copy_limit;
    this.delete_btn_is_after_el = delete_btn_is_after_el;
    this.count = document.querySelectorAll('.js-content').length;

    this.init();
    this.setEvent();
  }

  /**
   * initialize
   */
  init() {
  }

  /**
   * setEvent
   */
  setEvent() {
    this.add_button.addEventListener('click', (e) => {
      this.onClick(e);
    });

    document.querySelectorAll('.js-remove').forEach((item) => {
      item.addEventListener('click', (e) => {
        this.onClick(e);
      });
    });
  }

  /**
   * onClick
   * @param {Event} e
   */
  onClick(e) {
    switch (e.target) {
      case this.add_button:
        if (this.count > 9) return;
        this.insertFragment(this.createFragment());
        this.isLimit();
        break;
      case this.remove_button:
        this.removeSelf(e);
        break;
    }
  }

  /**
   * create fragment
   * @returns {DocumentFragment} fragment
   */
  createFragment() {
    const fragment = document.createDocumentFragment();
    const clone = document.importNode(this.template.content, true);
    fragment.appendChild(clone);
    return fragment;
  }

  /**
   * insert fragment
   * @param {DocumentFragment} fragment
   */
  insertFragment(fragment) {
    this.parent.insertBefore(fragment, this.add_button);
    this.count++;
    document.querySelectorAll('.js-content')[this.count - 1].querySelector(
        '.js-remove').addEventListener('click', (e) => {
      this.removeSelf(e);
    });
  }

  /**
   * remove content
   * @param {Event} e
   */
  removeSelf(e) {
    // 擬似要素clickで削除する時
    if (this.delete_btn_is_after_el) {
      if (e.offsetX > e.target.offsetWidth) {
        e.target.parentNode.removeChild(e.target);
      }
    }
    e.target.parentNode.remove();
    this.count--;
    this.isLimit();
  }

  /**
   * 制限か判定
   */
  isLimit() {
    this.count >= this.copy_limit
        ? this.add_button.style.opacity = 0.5
        : this.add_button.style.opacity = 1;
  }
}
