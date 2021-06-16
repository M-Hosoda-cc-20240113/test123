/**
 * listやcheckboxなどで複数の要素を表示する際に制限する
 *
 * 1,listやcheckboxなどの要素一つ一つに任意のクラス(contents)をつける
 * 2,もっと見るボタンに任意のクラス(more_open)をつける
 * 3,表示したい要素の数(display_count)
 *
 */
export class ListMoreOpen {
  constructor(more_open, contents, display_count) {
    this.more_open_btn = more_open;
    this.contents = contents;
    this.display_count = display_count;
    this.init();
    this.setEvent();
  }

  /**
   * initialize
   */
  init() {
    this.contents.forEach((content, index) => {
      this.contentsHide(content, index);
    });
    return this;
  }

  /**
   * set event
   */
  setEvent() {
    this.more_open_btn.addEventListener('click', () => {
      this.onClick();
    });
  }

  /**
   * on click event
   */
  onClick() {
    if (!this.isActive()) {
      this.contents.forEach((content) => {
        this.moreOpen(content);
      });
      this.more_open_btn.textContent = '閉じる';
      this.more_open_btn.classList.add('js-list-more-open_active');
    } else {
      this.contents.forEach((content, index) => {
        this.contentsHide(content, index);
      });
      this.more_open_btn.textContent = '....もっと見る';
      this.more_open_btn.classList.remove('js-list-more-open_active');
    }
  }

  /**
   * show contents
   * @param {HTMLElement} content
   */
  moreOpen(content) {
    content.style.display = 'block';
  }

  /**
   * hide contents
   * @param {number} index
   * @param {HTMLElement} content
   */
  contentsHide(content, index) {
    if (index > this.display_count) {
      content.style.display = 'none';
    }
  }

  /**
   * @return boolean
   */
  isActive() {
    return this.more_open_btn.classList.contains('js-list-more-open_active');
  }
}
