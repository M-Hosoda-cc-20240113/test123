export class MoreOpen {
  constructor(more_open, contents, display_count) {
    this.more_open_btn = more_open;
    this.contents = contents;
    this.display_count = display_count;
    this.init();
    this.setEvent();
  }

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

  onClick() {
    if (!this.more_open_btn.classList.contains('is_open')) {
      this.contents.forEach((content) => {
        this.moreOpen(content);
      });
      this.more_open_btn.textContent = '閉じる';
      this.more_open_btn.classList.add('is_open');
    } else {
      this.contents.forEach((content, index) => {
        this.contentsHide(content, index);
      });
      this.more_open_btn.textContent = '....もっと見る';
      this.more_open_btn.classList.remove('is_open');
    }
  }

  moreOpen(content) {
    content.style.display = 'block';
  }

  contentsHide(content, index) {
    if (index > this.display_count) {
      content.style.display = 'none';
    }
  }
}
